<?php
session_start();
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
    
    $sql = "SELECT * FROM admin WHERE username='$adminUsername'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($adminPassword, $row['password'])) {
            $_SESSION['admin'] = $adminUsername;
            header("Location: admin_dashboard.php");
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No such admin user.";
    }
}

$conn->close();
?>
