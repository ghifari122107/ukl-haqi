<?php include '../service/koneksi database.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Read products</title>
    <link rel="stylesheet" href="dasboard.css">
</head>
<body>
    <h2>Read products</h2>
    <table border="1">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>price</th>
            <th>image</th> 
            <th>action</th>
            
        </tr>
       
        <?php
        $sql = "SELECT * FROM products";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["name"]."</td>
                        <td>".$row["price"]."</td>
                        <td>".$row["image"]."</td>
                        <td>
                            <a href='edit_products.php?id=".$row["id"]."' class='edit'>Edit</a> | 
                            <a href='delete_products.php?id=".$row["id"]."' class='delete'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>0 results</td></tr>";
        }
        
        ?>
    </table>
    <tr>
        <a href="landing admin.php">kembali</a>
    </tr>
</body>
</html>
