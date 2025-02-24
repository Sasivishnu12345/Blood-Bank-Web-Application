<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bloodbank";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adminUsername = $_POST['username'];
    $adminPassword = $_POST['password'];

    // Hash the password
    $hashedPassword = password_hash($adminPassword, PASSWORD_DEFAULT);

    // Insert admin details into the database
    $sql = "INSERT INTO admin (username, password) VALUES ('$adminUsername', '$hashedPassword')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Admin registration successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
