<?php
$servername = "127.0.0.1:51188";
$username = "azure";
$password = "6#vWHD_$";
$dbname = "localdb";
$id = $_POST['id'];
$name = $_POST['name'];
$BC1 = $_POST['BC1'];
$BC2 = $_POST['BC2'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO laskuri (ID,Name)
VALUES ($id, '$name')";

$sql = "INSERT INTO basiccalc (ID,BC1,BC2)
VALUES ($id, $BC1,$BC2)";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

