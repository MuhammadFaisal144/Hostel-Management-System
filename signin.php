<?php
include('connection.php');
if(isset($_POST['submit'])) {
    $em = $_POST['email'];
    $password = $_POST['pass'];
    $query = mysqli_query($con, "SELECT * FROM sign_up WHERE email='$em' AND pass='$password'");
    $num = mysqli_num_rows($query);
    // if($num > 0) {
        // echo "<script>alert('Login successful');</script>";
        if($em == 'muhammadfaisal3896@gmail.com') {
           
        header("Location: Apanel.php");
        }
        else{
            header("Location: student_details.php");
        }
        
    } 
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="SIGNIN.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <form action="" method="POST">
                <h2>Sign In</h2>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <label for="pass">Password</label>
                <input type="password" id="pass" name="pass" required>
                <input type="submit" name="submit" value="Log in">
            </form>
            
        </div>
        <div class="image-container">
            <img src="person.png" alt="Person with Laptop">
        </div>
    </div>
</body>
</html>
