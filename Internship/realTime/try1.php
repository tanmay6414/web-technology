<!DOCTYPE html>
<html>
<head>
	<title>gfsyus</title>
</head>
<body>
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
$sql="SELECT val from realtimeval order by id desc limit 1";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
echo $row['val'];
}
?>
</body>
</html>

