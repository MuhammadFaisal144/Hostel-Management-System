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
            width: 80%;
            margin: 20px auto;
            background-color: #2c3e50;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .form-container input, .form-container button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        }

        .form-container button {
            background-color: #1abc9c;
            color: #fff;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #16a085;
        }

        .form-container a {
            display: inline-block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            background-color: #1abc9c;
            color: #fff;
            text-align: center;
            text-decoration: none;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        }

        .form-container a:hover {
            background-color: #16a085;
        }
    </style>
</head>
<body>

<h2>Rooms Detail</h2>

<div class="form-container">
    <h3>Add Room</h3>
    <form method="post" action="">
        <input type="text" name="room_no" placeholder="Room No" required>
        <input type="text" name="seater" placeholder="Seater" required>
        <input type="text" name="rent" placeholder="Rent" required>
        <button type="submit" name="add_room">Add Room</button>
    </form>
    <a href="Apanel.php">Go to Admin Panel</a>
</div>

<table>
    <tr>
        <th>Room NO</th>
        <th>Seater</th>
        <th>Rent</th>
        <th>Action</th> <!-- New column for delete button -->
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

        if (isset($_POST['add_room'])) {
            $room_no = $_POST['room_no'];
            $seater = $_POST['seater'];
            $rent = $_POST['rent'];
            
            $insert_query = "INSERT INTO rooms (Room_No, Seater, Rent) VALUES ('$room_no', '$seater', '$rent')";
            mysqli_query($con, $insert_query);
        }

        if (isset($_GET['delete_room'])) {
            $room_no = $_GET['delete_room'];
            
            $delete_query = "DELETE FROM rooms WHERE Room_No = '$room_no'";
            mysqli_query($con, $delete_query);
        }

        $query = mysqli_query($con, "SELECT Room_No, Seater, Rent FROM rooms");

        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>" . $row["Room_No"] . "</td>";
                echo "<td>" . $row["Seater"] . "</td>";
                echo "<td>" . $row["Rent"] . "</td>";
                echo "<td><a href='?delete_room=" . $row["Room_No"] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No records found</td></tr>";
        }

        mysqli_close($con);
    ?>
</table>

</body>
</html>
