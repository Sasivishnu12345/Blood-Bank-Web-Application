<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bloodbank";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$age = $_POST['age'];
$blood_type = $_POST['blood_type'];
$contact = $_POST['contact'];
$email = $_POST['email'];

$sql = "INSERT INTO donors (name, age, blood_type, contact,email) VALUES ('$name', '$age', '$blood_type', '$contact','$email')";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .success {
            color: #4CAF50;
        }
        .error {
            color: #f44336;
        }
        .message {
            font-size: 1.2em;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    if ($conn->query($sql) === TRUE) {
        echo "<div class='message success'>Donor registration successful</div>";
    } else {
        echo "<div class='message error'>Error: " . htmlspecialchars($sql) . "<br>" . htmlspecialchars($conn->error) . "</div>";
    }

    $conn->close();
    ?>
</div>

</body>
</html>
