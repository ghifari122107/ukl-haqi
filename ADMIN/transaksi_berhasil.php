<?php
session_start();

if (!isset($_SESSION['success_message']) || !isset($_SESSION['order_details'])) {
    header("Location: index.php");
    exit();
}

$message = $_SESSION['success_message'];
$order_details = $_SESSION['order_details'];
unset($_SESSION['success_message']);
unset($_SESSION['order_details']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Berhasil</title>
    <link rel="stylesheet" href="transaksi.css">
</head>
<body>
    <div class="message-container">
        <h1>Transaksi Berhasil</h1>
        <p><?php echo htmlspecialchars($message); ?></p>
        <div class="order-details">
            <p><strong>Nama Produk:</strong> <?php echo htmlspecialchars($order_details['product_name']); ?></p>
            <p><strong>Nama Pengguna:</strong> <?php echo htmlspecialchars($order_details['customer_name']); ?></p>
            <p><strong>Jumlah:</strong> <?php echo htmlspecialchars($order_details['quantity']); ?></p>
            <p><strong>Total Harga:</strong> Rp <?php echo number_format($order_details['total_price'], 2, ',', '.'); ?></p>
        </div>
        <a href="../user.php" class="btn">Kembali ke Beranda</a>
    </div>
</body>
</html>
