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
    $sql = "SELECT * FROM orders WHERE id=$id";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No order found";
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $id = $_POST['id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $sql = "UPDATE orders SET id='$id', product_id='$product_id', quantity='$quantity', customer_email='$customer_email', customer_name='$customer_name' WHERE id=$id";

    if ($db->query($sql) === TRUE) {
        header("Location: tebel_orders.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Jenis Bibit Ikan</title>
</head>
<body>
    <h2>Update Jenis Bibit Ikan</h2>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        
        product_id: <input type="text" name="product_id" value="<?php echo $row['product_id']; ?>" required><br>
        quantity: <input type="text" name="quantity" value="<?php echo $row['quantity']; ?>" required><br>
        customer_name: <input type="text" name="customer_name" value="<?php echo $row['customer_name']; ?>" required><br>
        customer_email: <input type="text" name="customer_email" value="<?php echo $row['customer_email']; ?>" required><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
