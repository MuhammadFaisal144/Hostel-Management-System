<!DOCTYPE html>
<html>
<head>
    <title>List of Students</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #34495e;
            color: #fff;
        }

        h2 {
            text-align: center;
            color: #ecf0f1;
            margin-top: 20px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: #2c3e50;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 12px;
            color: #ecf0f1;
        }

        th {
            background-color: #1abc9c;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #34495e;
        }

        tr:hover {
            background-color: #1abc9c;
            color: #fff;
        }

        .form-container {
            text-align: center;
            margin: 20px auto;
            width: 80%;
            background-color: #2c3e50;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            border-radius: 10px;
        }

        .form-container input, .form-container button {
            padding: 10px;
            margin: 5px;
            border: none;
            border-radius: 5px;
        }

        .form-container input {
            width: 30%;
        }

        .form-container button {
            background-color: #1abc9c;
            color: white;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #16a085;
        }

        .form-container a {
            display: block;
            margin-top: 10px;
            color: #1abc9c;
            text-decoration: none;
        }

        .form-container a:hover {
            color: #16a085;
        }
    </style>
</head>
<body>

<h2>List of Students</h2>

<div class="form-container">
    <h3>Add Student</h3>
    <form method="post" action="">
        <input type="text" name="fname" placeholder="First Name" required>
        <input type="text" name="lname" placeholder="Last Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit" name="add_student">Add Student</button>
    </form>
    <a href="Apanel.php">Go to Admin Panel</a>
</div>

<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Action</th>
        <th>Email</th>
    </tr>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "hms";
        $con = mysqli_connect($servername, $username, $password, $dbname);

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if (isset($_POST['add_student'])) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            
            $stmt = $con->prepare("INSERT INTO sign_up (fname, lname, email) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $fname, $lname, $email);
            $stmt->execute();
            $stmt->close();
        }

        if (isset($_GET['delete_student'])) {
            $fname = $_GET['fname'];
            $lname = $_GET['lname'];
            $email = $_GET['email'];
            
            $stmt = $con->prepare("DELETE FROM sign_up WHERE fname = ? AND lname = ? AND email = ?");
            $stmt->bind_param("sss", $fname, $lname, $email);
            $stmt->execute();
            $stmt->close();
        }

        if (isset($_POST['update_student'])) {
            $old_fname = $_POST['old_fname'];
            $old_lname = $_POST['old_lname'];
            $old_email = $_POST['old_email'];
            $new_fname = $_POST['new_fname'];
            $new_lname = $_POST['new_lname'];
            $new_email = $_POST['new_email'];

            $stmt = $con->prepare("UPDATE sign_up SET fname = ?, lname = ?, email = ? WHERE fname = ? AND lname = ? AND email = ?");
            $stmt->bind_param("ssssss", $new_fname, $new_lname, $new_email, $old_fname, $old_lname, $old_email);
            $stmt->execute();
            $stmt->close();
        }

        $query = $con->query("SELECT fname, lname, email FROM sign_up");

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["fname"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["lname"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                echo "<td>
                        <a href='?delete_student=1&fname=" . urlencode($row["fname"]) . "&lname=" . urlencode($row["lname"]) . "&email=" . urlencode($row["email"]) . "' style='color: red;'>Delete</a>
                        <a href='?edit_student=1&fname=" . urlencode($row["fname"]) . "&lname=" . urlencode($row["lname"]) . "&email=" . urlencode($row["email"]) . "' style='color: green;'>Edit</a>
                      </td>";
                echo "<td>
                        <a href='mailto:" . htmlspecialchars($row["email"]) . "?subject=Hello " . urlencode($row["fname"]) . " " . urlencode($row["lname"]) . "&body=Dear " . urlencode($row["fname"]) . ",%0D%0A%0D%0AYour details have been updated in our system.' style='color: #1abc9c;'>Send Email</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No records found</td></tr>";
        }

        $con->close();
    ?>
</table>

<?php
    if (isset($_GET['edit_student'])) {
        $fname = $_GET['fname'];
        $lname = $_GET['lname'];
        $email = $_GET['email'];
        echo "
        <div class='form-container'>
            <h3>Edit Student</h3>
            <form method='post' action=''>
                <input type='hidden' name='old_fname' value='" . htmlspecialchars($fname) . "'>
                <input type='hidden' name='old_lname' value='" . htmlspecialchars($lname) . "'>
                <input type='hidden' name='old_email' value='" . htmlspecialchars($email) . "'>
                <input type='text' name='new_fname' placeholder='First Name' value='" . htmlspecialchars($fname) . "' required>
                <input type='text' name='new_lname' placeholder='Last Name' value='" . htmlspecialchars($lname) . "' required>
                <input type='email' name='new_email' placeholder='Email' value='" . htmlspecialchars($email) . "' required>
                <button type='submit' name='update_student'>Update Student</button>
            </form>
        </div>";
    }
?>

</body>
</html>
