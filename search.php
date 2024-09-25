<?php

$conn = new mysqli("localhost", "root", "");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$create_db_query = "CREATE DATABASE IF NOT EXISTS blood_donors";
if ($conn->query($create_db_query) === FALSE) {
    echo "Error creating database: " . $conn->error;
}


$conn->select_db("blood_donors");

$create_table_query = "CREATE TABLE IF NOT EXISTS donors (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT(3) NOT NULL,
    blood_group VARCHAR(5) NOT NULL,
    contact VARCHAR(20) NOT NULL,
    UNIQUE KEY unique_donor (name, age, blood_group, contact)
)";

if ($conn->query($create_table_query) === FALSE) {
    echo "Error creating table: " . $conn->error;
}


$check_empty_query = "SELECT COUNT(*) AS count FROM donors";
$result = $conn->query($check_empty_query);
$row = $result->fetch_assoc();
if ($row['count'] == 0) {

    $initial_values_query = "INSERT INTO donors (name, age, blood_group, contact) VALUES
    ('Ramesh', 30, 'A+', '1234567890'),
    ('Suresh', 25, 'B-', '9876543210'),
    ('Priya', 35, 'AB+', '1231231234'),
    ('Deepak', 40, 'O+', '4567890123'),
    ('Neeta', 30, 'A+', '1234567890'),
    ('Vijay', 25, 'B+', '9876543210'),
    ('Pooja', 35, 'AB+', '1231231234'),
    ('Amit', 40, 'O+', '4567890123'),
    ('Neha', 30, 'A+', '1234567890'),
    ('Rajesh', 25, 'B-', '9876543210'),
    ('Anita', 35, 'AB+', '1231231234'),
    ('Sanjay', 40, 'O+', '4567890123'),
    ('Kavita', 30, 'A+', '1234567890'),
    ('Sunil', 25, 'B-', '9876543210'),
    ('Meena', 35, 'AB+', '1231231234'),
    ('Prakash', 40, 'O+', '4567890123'),
    ('Sunita', 30, 'A+', '1234567890'),
    ('Raj', 25, 'B+', '9876543210'),
    ('Sarita', 35, 'AB+', '1231231234'),
    ('Alok', 40, 'O+', '4567890123'),
    ('Sheetal', 30, 'A+', '1234567890'),
    ('Vivek', 25, 'B+', '9876543210'),
    ('Savita', 35, 'AB+', '1231231234'),
    ('Anand', 40, 'O+', '4567890123'),
    ('Asha', 30, 'A+', '1234567890'),
    ('Rakesh', 25, 'B-', '9876543210'),
    ('Divya', 35, 'AB+', '1231231234'),
    ('Ajay', 40, 'O+', '4567890123'),
    ('Sangeeta', 30, 'A+', '1234567890'),
    ('Manoj', 25, 'B-', '9876543210'),
    ('Anjali', 35, 'AB+', '1231231234'),
    ('Ashok', 40, 'O+', '4567890123'),
    ('Suman', 30, 'A-', '1234567890'),
    ('Arun', 25, 'B-', '9876543210'),
    ('Usha', 35, 'AB-', '1231231234'),
    ('Girish', 40, 'O+', '4567890123'),
    ('Jyoti', 30, 'A+', '1234567890'),
    ('Dinesh', 25, 'B-', '9876543210'),
    ('Madhu', 35, 'AB-', '1231231234'),
    ('Gopal', 40, 'O+', '4567890123'),
    ('Kiran', 30, 'A+', '1234567890'),
    ('Nitin', 25, 'B+', '9876543210'),
    ('Rekha', 35, 'AB+', '1231231234'),
    ('Mukesh', 40, 'O+', '4567890123'),
    ('Seema', 30, 'A-', '1234567890'),
    ('Deepak', 25, 'B-', '9876543210'),
    ('Arti', 35, 'AB+', '1231231234'),
    ('Vinod', 40, 'O+', '4567890123'),
    ('Ritu', 30, 'A+', '1234567890'),
    ('Rajiv', 25, 'B-', '9876543210'),
    ('Rahul', 35, 'AB+', '1231231234'),
    ('Sneha', 40, 'O+', '4567890123'),
    ('Anita', 30, 'A-', '1234567890'),
    ('Sunil', 25, 'B-', '9876543210'),
    ('Priya', 35, 'AB+', '1231231234'),
    ('Amit', 40, 'O-', '4567890123'),
    ('Rakesh', 30, 'A+', '1234567890'),
    ('Sheetal', 25, 'B-', '9876543210'),
    ('Vivek', 35, 'AB+', '1231231234'),
    ('Savita', 40, 'O-', '4567890123'),
    ('Anand', 30, 'A-', '1234567890'),
    ('Asha', 25, 'B-', '9876543210'),
    ('Rajesh', 35, 'AB-', '1231231234'),
    ('Divya', 40, 'O+', '4567890123'),
    ('Ajay', 30, 'A+', '1234567890'),
    ('Sangeeta', 25, 'B-', '9876543210'),
    ('Manoj', 35, 'AB+', '1231231234'),
    ('Anjali', 40, 'O-', '4567890123'),
    ('Ashok', 30, 'A+', '1234567890'),
    ('Suman', 25, 'B-', '9876543210'),
    ('Arun', 35, 'AB+', '1231231234'),
    ('Usha', 40, 'O+', '4567890123'),
    ('Girish', 30, 'A+', '1234567890'),
    ('Jyoti', 25, 'B-', '9876543210'),
    ('Dinesh', 35, 'AB-', '1231231234'),
    ('Madhu', 40, 'O-', '4567890123'),
    ('Gopal', 30, 'A+', '1234567890'),
    ('Kiran', 25, 'B-', '9876543210'),
    ('Nitin', 35, 'AB+', '1231231234'),
    ('Rekha', 40, 'O+', '4567890123'),
    ('Mukesh', 30, 'A+', '1234567890'),
    ('Seema', 25, 'B-', '9876543210'),
    ('Deepak', 35, 'AB+', '1231231234'),
    ('Arti', 40, 'O+', '4567890123'),
    ('Vinod', 30, 'A-', '1234567890'),
    ('Ritu', 25, 'B-', '9876543210'),
    ('Rajiv', 35, 'AB+', '1231231234'),
    ('Rahul', 40, 'O+', '4567890123'),
    ('Sneha', 30, 'A+', '1234567890')";
 

    if ($conn->query($initial_values_query) === FALSE) {
        echo "Error inserting initial values: " . $conn->error;
    }
}

if (isset($_GET['blood_group'])) {

    $blood_group = $_GET['blood_group'];

    $stmt = $conn->prepare("SELECT name, age, blood_group, contact FROM donors WHERE blood_group = ?");
    $stmt->bind_param("s", $blood_group);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {

        echo "<h2>Matching Blood Donors</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Donor Name</th><th>Age</th><th>Blood Group</th><th>Mobile No</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<center><tr><td>" . $row["name"] . "</td><td>" . $row["age"] . "</td><td>" . $row["blood_group"] . "</td><td>" . $row["contact"] . "</td></tr></center>";
        }
        echo "</table>";
    } else {
        echo "No donors found with the blood group: $blood_group";
    }
} else {

    echo "Please select a blood group to search.";
}

$conn->close();
?>
