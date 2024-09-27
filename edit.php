<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$con = mysqli_connect($servername, $username, $password, $dbname);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM sign_up WHERE id='$id'");
    $row = mysqli_fetch_assoc($query);
}

if (isset($_POST['update'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];

    mysqli_query($con, "UPDATE sign_up SET fname='$fname', lname='$lname', email='$email' WHERE id='$id'");
    header("Location: index.php");
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Record</title>
</head>
<body>
    <h2>Edit Record</h2>
    <form method="post" action="">
        <label>First Name:</label>
        <input type="text" name="fname" value="<?php echo $row['fname']; ?>" required><br>
        <label>Last Name:</label>
        <input type="text" name="lname" value="<?php echo $row['lname']; ?>" required><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>
