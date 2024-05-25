<?php

    include "service/koneksi database.php";

    if(isset($_POST["register"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $alamat = $_POST["alamat"];
        $email = $_POST["email"];
        $role = 'user';

        $sql = "INSERT INTO user (id_user, username, password, alamat, email, role ) VALUES ('', '$username', '$password', '$alamat', '$email', '$role')";

        if($db->query($sql)) {
            echo "Data MASUK";
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
    <title>register only</title>
</head>
<body>
    
    <?php
    include "layout/header.html"
    ?>
    <h3>Daftar Akun</h3>
    <form action="" method="POST">
        <input type="text" placeholder="username" name="username"/>
        <input type="password" placeholder="password" name="password"/>
        <input type="text" placeholder="alamat" name="alamat"/>
        <input type="email" placeholder="email" name="email"/>
        <button type="submit" name="register">Daftar Sekarang</button>
    </form>

</body>
</html>