<?php
include '../service/koneksi database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE id_user=$id";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No user found";
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $sql = "UPDATE user SET username='$username', alamat='$alamat', email='$email', role='$role' WHERE id_user=$id";

    if ($db->query($sql) === TRUE) {
        header("Location: dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
</head>
<body>
    <h2>Update User</h2>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $row['id_user']; ?>">
        Username: <input type="text" name="username" value="<?php echo $row['username']; ?>" required><br>
        Alamat: <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" required><br>
        Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
        Role: 
        <select name="role" required>
            <option value="user" <?php if($row['role'] == 'user') echo 'selected'; ?>>User</option>
            <option value="admin" <?php if($row['role'] == 'admin') echo 'selected'; ?>>Admin</option>
        </select><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
