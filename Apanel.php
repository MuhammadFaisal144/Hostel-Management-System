<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: url('hostel.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            text-align: center;
        }

        h1 {
            color: #ecf0f1;
            margin-top: 50px;
        }

        nav {
            margin: 20px 0;
        }

        nav a {
            margin: 0 10px;
            padding: 10px 20px;
            background-color: rgba(26, 188, 156, 0.8);
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: rgba(22, 160, 133, 0.8);
        }

        .table-container {
            margin: 40px auto;
            width: 90%;
            max-width: 1000px;
            background-color: rgba(44, 62, 80, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            color: #fff;
            text-align: left;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: rgba(26, 188, 156, 0.8);
        }

        tr:hover {
            background-color: rgba(44, 62, 80, 0.7);
        }

        .about-section {
            background-color: rgba(44, 62, 80, 0.9);
            padding: 50px 20px;
            margin-top: 40px;
        }

        .about-section h2 {
            color: #ecf0f1;
        }

        .about-section p {
            color: #bdc3c7;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <h1>Welcome Admin</h1>
    <nav>
        <a href="List.php">Students</a>
        <a href="Rooms.php">Rooms</a>
        <a href="#about">About</a>
        <a href="index.php">Logout</a>
    </nav>
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
    </style>
</head>
<body>

<h2 ><FONT COLOR="black">Statistics</h2>

<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <!-- Add more columns as needed -->
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

        $query = mysqli_query($con, "SELECT fname, lname, email FROM sign_up");

        // Check if there are any records
        if (mysqli_num_rows($query) > 0) {
            // Output data of each row
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>" . $row["fname"] . "</td>";
                echo "<td>" . $row["lname"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                // Add more columns as needed
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No records found</td></tr>";
        }

        mysqli_close($con);
    ?>
</table>
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

<h2><FONT COLOR="black">Room Statistics</h2>
<table>
    <tr>
        <th>Room NO</th>
        <th>Seater</th>
        <th>Rent</th>
        
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

        $query = mysqli_query($con, "SELECT Room_No, Seater, Rent FROM rooms");

        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>" . $row["Room_No"] . "</td>";
                echo "<td>" . $row["Seater"] . "</td>";
                echo "<td>" . $row["Rent"] . "</td>";
               
            }
        } else {
            echo "<tr><td colspan='4'>No records found</td></tr>";
        }

        mysqli_close($con);
    ?>
</table>

</body>
</html>


</body>
</html>

    <div id="about" class="about-section">
        <h2>About</h2>
        <p>
            This is the admin section for managing the hostel. You can view and manage student details, allocate rooms, and handle other administrative tasks. Use the navigation links above to access different sections of the admin panel. The "Students" link will take you to the list of students, and the "Rooms" link will take you to the room management page. The "About" section provides an overview of this admin panel's purpose and functionalities.
        </p>
    </div>
</body>
</html>
