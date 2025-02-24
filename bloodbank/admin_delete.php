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

    // Delete admin account from the database
    $sql = "DELETE FROM admin WHERE username='$adminUsername'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Admin account deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
