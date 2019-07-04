<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qjt";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$val = $_GET["val"];

$sql = "INSERT INTO realtimeval (val) VALUES ($val)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>