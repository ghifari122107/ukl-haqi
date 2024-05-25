<?php

    include "../service/koneksi database.php";

    if(isset($_POST["tambah_ikan"])) {
        $harga = $_POST["harga"];
        $deskripsi = $_POST["deskripsi"];

        $sql = "INSERT INTO jenis_jenis_bibit_ikan (id_ikan, harga, deskripsi) VALUES ('', '$harga', '$deskripsi')";

        if($db->query($sql)) {
        header("Location: jenis_ikan.php");
        }else {
            echo "Data tidak MASUK: " . $db->error;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>tambah_ikan</title>
</head>
<body>
    
    <?php
  
    ?>
    <h3>tambah_ikan</h3>
    <form action="" method="POST">
        <input type="text" placeholder="harga" name="harga"/>
        <input type="text" placeholder="deskripsi" name="deskripsi"/>
        <button type="submit" name="tambah_ikan">tambah_Sekarang</button>
    </form>

</body>
</html>