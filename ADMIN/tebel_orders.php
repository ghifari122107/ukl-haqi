
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_bisnis";

$db = new mysqli($servername, $username, $password, $dbname);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "
SELECT orders.id, orders.product_id, orders.quantity, orders.customer_name, products.name AS nama_ikan, orders.customer_email
FROM orders
JOIN products ON orders.product_id = products.id
";
$result = $db->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>tebel_orders</title>
    <style>
            <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f4b41a;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        td {
            color: #333;
        }
        a {
            text-decoration: none;
            color: #2196F3;
        }
        a:hover {
            text-decoration: underline;
        }
        .edit {
            color: #4CAF50;
        }
        .delete {
            color: #F44336;
        }
        .back-link {
            display: block;
            text-align: center;
            margin: 20px;
            font-size: 16px;
            color: #2196F3;
        }
    </style>
    </style>
</head>
<body>
    <h2>tebel_orders</h2>
    <table>
        <tr>
            <th>id</th>
            <th>product_id</th>
            <th>quantity</th>
            <th>customer_name</th>
            <th>nama_ikan</th>
            <th>customer_email</th>
            <th>berubah</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["product_id"]."</td>
                        <td>".$row["quantity"]."</td>
                        <td>".$row["customer_name"]."</td>
                        <td>".$row["nama_ikan"]."</td>
                        <td>".$row["customer_email"]."</td>
                        <td>
                            <a href='edit_order.php?id=".$row["id"]."' class='edit'>Edit</a> | 
                            <a href='delete_order.php?id=".$row["id"]."' class='delete'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
        }
        ?>
    </table>
    <a href="landing admin.php" class="back-link">Kembali</a>
</body>
</html>
