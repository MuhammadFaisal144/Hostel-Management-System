<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$con = mysqli_connect($servername, $username, $password, $dbname);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($con, "SELECT email FROM sign_up WHERE id='$id'");
    $row = mysqli_fetch_assoc($query);

    $to = $row['email'];
    $subject = "Your Subject Here";
    $message = "Your Message Here";
    $headers = "From: your-email@example.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully to " . $to;
    } else {
        echo "Failed to send email.";
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Send Email</title>
</head>
<body>
    <h2>Send Email</h2>
    <a href="index.php">Return to Home</a>
</body>
</html>
