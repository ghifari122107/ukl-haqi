<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan ikan</title>
    <link rel="stylesheet" href="stokikan.css"/>
</head>
<body>
    <header>
        <nav>
            <h1 class="logo">
                <a href="/">indonesia</a>
            </h1>
            <a href="../user.php" class="btn-sign-up">Kembali</a>
        </nav>
        <div class="header-title">Pemesanan ikan</div>
        <div class="header-bottom">
            <p class="today-date">22<span>/11 /2023</span></p>
        </div>
    </header>

    <section id="products">
        <div class="products-container">
            <div class="product-box">
                <img src="../lele.jpg" alt="Ikan Lele">
                <h3>Ikan Lele</h3>
                <p>Harga: Rp 10.000</p>
                <a href="order.php?id=1" class="order-button">Pesan Sekarang</a>
            </div>
            <div class="product-box">
                <img src="../koi.jpg" alt="Ikan Koi">
                <h3>Ikan Koi</h3>
                <p>Harga: Rp 50.000</p>
                <a href="order.php?id=2" class="order-button">Pesan Sekarang</a>
            </div>
            <div class="product-box">
                <img src="../arwana.jpg" alt="Ikan Arwana">
                <h3>Ikan Arwana</h3>
                <p>Harga: Rp 100.000</p>
                <a href="order.php?id=3" class="order-button">Pesan Sekarang</a>
            </div>
        </div>
    </section>

    <footer>
        @dibuat dengan sepenuh hati tanpa "down pelit - pelit"
    </footer>
</body>
</html>
