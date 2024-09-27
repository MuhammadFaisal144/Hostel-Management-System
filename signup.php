<?php
include('connection.php');
if(isset($_POST['submit']))
{
    $finame = $_POST['fname'];
    $laname = $_POST['lname'];
    $em = $_POST['email'];
    $password = $_POST['pass'];
    $cpassword = $_POST['cpass'];
    $query = mysqli_query($con, "SELECT * FROM sign_up WHERE email='$em'");
    $num = mysqli_num_rows($query);
    if($num > 0) {
        echo "<script>alert('Email already exists');</script>";
    } else {
        if($password == $cpassword) {
            $sql = "INSERT INTO sign_up(fname, lname, email, pass, cpass) VALUES('$finame', '$laname', '$em', '$password', '$cpassword')";
            if (mysqli_query($con, $sql)) {
                // Redirect to home page after successful sign-up
                header("Location: index.php");
                exit();
            } else {
                echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
            }
        } else {
            echo "<script>alert('Passwords do not match');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="SIGNUP.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <form action="signup.php" method="POST">
                <h2>Sign up</h2>
                <label for="fname">Your Name</label>
                <input type="text" id="fname" name="fname" required>
                <label for="lname">Your Last Name</label>
                <input type="text" id="lname" name="lname" required>
                <label for="email">Your Email</label>
                <input type="email" id="email" name="email" required>
                <label for="pass">Password</label>
                <input type="password" id="pass" name="pass" required>
                <label for="cpass">Repeat your password</label>
                <input type="password" id="cpass" name="cpass" required>
                <input type="submit" name="submit" value="Register">
            </form>
        </div>
        <div class="image-container">
            <img src="desk.png" alt="Desk Image">
        </div>
    </div>
</body>
</html>
