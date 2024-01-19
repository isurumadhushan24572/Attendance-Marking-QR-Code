<?php
// Database connection information
$db_host = "database-1.cvr5ykqxjc4b.eu-north-1.rds.amazonaws.com";
$db_user = "admin";
$db_pass = "sfdatabase";
$db_name = "sf";

// Establish a connection to the database
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get user input from the login form
$uname = $_POST["uname"];
$password = $_POST["password"];

// SQL query to check if login data is correct
$sql = "SELECT * FROM register WHERE uname='$uname' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
} else {
    // Check if a row was returned
    if (mysqli_num_rows($result) == 1) {
        // Login data is correct

        // Record attendance with the current timestamp
        $attendance_sql = "INSERT INTO attendance (StudentID) VALUES ('$uname')";
        if (mysqli_query($conn, $attendance_sql)) {
            
        } else {
            echo "Error recording attendance: " . mysqli_error($conn);
        }

        // You can redirect the user to a welcome page or perform other actions here
    } else {
        // Login data is incorrect
        echo "Invalid login credentials. Please try again.";
    }
}

// Close the database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #3498db; /* Electric blue background color */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .success-message {
            font-size: 24px;
            color: #000; /* Black font color */
            margin-bottom: 20px;
        }

        /* Add media queries for responsiveness */
        @media (max-width: 600px) {
            .container {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <p class="success-message">Thank you, attendance record successfully added.</p>
        <!-- You can add additional content or links here -->
    </div>
</body>
</html>
