<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "blood_requests";
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {

    $conn->select_db($dbname);

    $sql = "CREATE TABLE IF NOT EXISTS requests (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        age INT(3) NOT NULL,
        blood_type VARCHAR(5) NOT NULL,
        contact VARCHAR(255) NOT NULL
    )";

    if ($conn->query($sql) === TRUE) {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
            $name = $_POST["name"];
            $age = $_POST["age"];
            $blood_type = $_POST["blood_type"];
            $contact = $_POST["contact"];

            $sql = "INSERT INTO requests (name, age, blood_type, contact)
                    VALUES ('$name', '$age', '$blood_type', '$contact')";

            if ($conn->query($sql) === TRUE) {
           
                echo "<script>alert('Request submitted successfully'); window.location.href='requests.html';</script>";
                exit();
            } else {
                echo "<script>alert('Request is not submitted'); window.location.href='requests.html';</script>";
            }
        }
    } else {
        echo "Error creating table: " . $conn->error;
    }
} else {
    echo "Error creating database: " . $conn->error;
}


$conn->close();
?>
