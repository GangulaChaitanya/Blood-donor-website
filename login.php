<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];


    $conn = new mysqli("localhost", "root", "", "user_registration");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            echo "<script>alert('Login Successfull'); window.location.href='index1.html';</script>";
        } else {
            echo "<script>alert('Invalid Credentials'); window.location.href='index.html';</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials'); window.location.href='index.html';</script>";
    }

    // Close connection
    $conn->close();
}
?>
