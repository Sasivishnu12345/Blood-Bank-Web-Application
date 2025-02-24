<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bloodbank";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$blood_type = $_GET['blood_type'];

$sql = "SELECT name, age, blood_type, contact, registration_datetime,email FROM donors WHERE blood_type='$blood_type'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donors List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        h2 {
            color: #333;
            margin-top: 20px;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .no-donors {
            color: red;
            font-size: 1.2em;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<?php
if ($result->num_rows > 0) {
    echo "<h2>Donors List</h2>";
    echo "<table>";
    echo "<tr><th>Name</th><th>Age</th><th>Blood Type</th><th>Contact</th><th>Email</th><th>Registration Date and Time</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["age"]) . "</td>";
        echo "<td>" . htmlspecialchars($row['blood_type']) . "</td>";
        echo "<td>" . htmlspecialchars($row["contact"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["registration_datetime"]) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<div class='no-donors'>No donors found</div>";
}
$conn->close();
?>

</body>
</html>
