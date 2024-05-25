<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "web_bisnis";

$db = mysqli_connect($hostname, $username, $password, $database);

if($db->connect_error) {
    echo "Koneksi database gagal";
    die("error!");
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus user
    $sql = "DELETE FROM products WHERE id='$id'";
    if ($db->query($sql) === TRUE) {
        echo "<script>alert('hapus berhasil')</script>";
        header("Location: products.php");
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}
?>



