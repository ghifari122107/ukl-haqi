<?php
session_start();
include("../service/koneksi database.php"); // Ganti dengan file koneksi database Anda

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$product_id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo '<!DOCTYPE html>';
    echo '<html lang="en">';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<title>Detail Pemesanan</title>';
    echo '<link rel="stylesheet" href="stokikan.css">';
    echo '</head>';
    echo '<body>';
    echo '<header>';
    echo '<nav>';
    echo '<h1 class="logo"><a href="/">indonesia</a></h1>';
    echo '<a href="stok_ikan.php" class="btn-sign-up">Kembali</a>';
    echo '</nav>';
    echo '</header>';
    echo '<div class="product-detail">';
    echo '<img src="' . htmlspecialchars($row["image"]) . '" alt="' . htmlspecialchars($row["name"]) . '">';
    echo '<h3>' . htmlspecialchars($row["name"]) . '</h3>';
    echo '<p>Rp ' . number_format($row["price"], 2, ',', '.') . '</p>';
    echo '<form action="submit_order.php" method="post">';
    echo '<input type="hidden" name="product_id" value="' . htmlspecialchars($row["id"]) . '">';
    echo '<label for="quantity">Jumlah:</label>';
    echo '<input type="number" id="quantity" name="quantity" min="1" required>';
    echo '<input type="hidden" id="customer_name" name="customer_name" value="' . htmlspecialchars($_SESSION['username']) . '">';
    echo '<input type="hidden" id="customer_email" name="customer_email" value="' . htmlspecialchars($_SESSION['email']) . '">';
    echo '<button type="submit" class="btn">Konfirmasi Pemesanan</button>';
    echo '</form>';
    echo '</div>';
    echo '</body>';
    echo '</html>';
} else {
    echo "Produk tidak ditemukan.";
}

$stmt->close();
$db->close();
?>
