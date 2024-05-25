<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_bisnis";

$db = new mysqli($servername, $username, $password, $dbname);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id=$id";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No products found";
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $sql = "UPDATE products SET id='$id', name='$name', image='$image' WHERE id=$id";

    if ($db->query($sql) === TRUE) {
        header("Location: products.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update products</title>
</head>
<body>
    <h2>Update product</h2>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        Nama: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
        price: <input type="text" name="price" value="<?php echo $row['price']; ?>" required><br>
        image: <input type="text" name="image" value="<?php echo $row['image']; ?>" required><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
