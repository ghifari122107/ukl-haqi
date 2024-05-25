<?php
session_start();
include("../service/koneksi database.php"); // Ganti dengan file koneksi database Anda

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];
$customer_name = $_POST['customer_name'];
$customer_email = $_POST['customer_email']; // Pastikan variabel ini terisi

// Dapatkan informasi produk
$product_sql = "SELECT name, price FROM products WHERE id = ?";
$product_stmt = $db->prepare($product_sql);
$product_stmt->bind_param("i", $product_id);
$product_stmt->execute();
$product_result = $product_stmt->get_result();
$product = $product_result->fetch_assoc();

if (!$product) {
    $_SESSION['error_message'] = "Produk tidak ditemukan.";
    header("Location: transaksi_gagal.php");
    exit();
}

$product_name = $product['name'];
$product_price = $product['price'];
$total_price = $product_price * $quantity;

$sql = "INSERT INTO orders (product_id, quantity, customer_name, customer_email, order_date) VALUES (?, ?, ?, ?, NOW())";
$stmt = $db->prepare($sql);
$stmt->bind_param("iiss", $product_id, $quantity, $customer_name, $customer_email);

if ($stmt->execute()) {
    $_SESSION['success_message'] = "Pemesanan berhasil.";
    $_SESSION['order_details'] = [
        'product_name' => $product_name,
        'customer_name' => $customer_name,
        'quantity' => $quantity,
        'total_price' => $total_price
    ];
    header("Location: transaksi_berhasil.php");
    exit();
} else {
    $_SESSION['error_message'] = "Terjadi kesalahan: " . $stmt->error;
    header("Location: transaksi_gagal.php");
    exit();
}

$stmt->close();
$product_stmt->close();
$db->close();
?>
