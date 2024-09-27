<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);



include('connection.php');

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // header("Location: index.php"); // Redirect to login page if not logged in
    exit();
}

$email = $_SESSION['email']; // Get the email from session

// Fetch student details
$query = mysqli_query($con, "SELECT * FROM sign_up WHERE email='$email'");
if ($query === FALSE) {
    die("Error fetching data: " . mysqli_error($con));
}

$student = mysqli_fetch_assoc($query);

if (!$student) {
    echo "No student details found.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #34495e;
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .details-container {
            background-color: #2c3e50;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 300px;
            text-align: center;
        }

        h2 {
            color: #1abc9c;
            margin-bottom: 20px;
        }

        p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="details-container">
        <h2>Student Details</h2>
        <p><strong>ID:</strong> <?php echo htmlspecialchars($student['id']); ?></p>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($student['fname'] . ' ' . $student['lname']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($student['email']); ?></p>
        <p><strong>Created At:</strong> <?php echo htmlspecialchars($student['created_at']); ?></p>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
<?php
mysqli_close($con);
?>
