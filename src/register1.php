<?php
$uname = $_REQUEST["uname"];
$degree = $_REQUEST["degree"];
$password = $_REQUEST["password"];


// Database credentials for MySQL
$host = 'database-1.cvr5ykqxjc4b.eu-north-1.rds.amazonaws.com'; // Replace with your MySQL server host
$port = '3306'; // Default MySQL port
$dbname = 'sf'; // Replace with your MySQL database name
$username = 'admin'; // Replace with your MySQL username
$password_db = 'sfdatabase'; // Replace with your MySQL password

try {
    // Create a PDO connection to MySQL
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname";
    $pdo = new PDO($dsn, $username, $password_db);

    // Set PDO attributes (optional)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Perform database operations here

    // Example: Insert data into MySQL table
    $sql = "INSERT INTO register (uname, degree, password) VALUES (:uname, :degree, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':uname', $uname);
    $stmt->bindParam(':degree', $degree);
    $stmt->bindParam(':password', $password);


    if ($stmt->execute()) {



        
    } else {
        echo "Data Not inserted Successfully<br>";
    }

    // Other database operations (Update, Delete, Select) should be adapted similarly

    

    $pdo = null; // Close the database connection
} catch (PDOException $e) {
    // Handle database connection errors
    echo "Connection failed: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to BOCM University</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .welcome-container {
            text-align: center;
            padding: 100px;
        }
        h1 {
            font-size: 36px;
            color: #333;
        }
        p {
            font-size: 18px;
            color: #555;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            font-size: 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>Welcome to NTBM University</h1>
        <p>Your path to knowledge begins here.</p>
        <a href="index.html" class="btn">Login</a>
    </div>
</body>
</html>
