<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname1 = "myDB1";
$dbname2= "myDB2";

// MySQLi Procedural

// Create connection
$conn1 = mysqli_connect($servername, $username, $password, $dbname1);
// Check connection
if (!$conn1) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "DELETE FROM MyGuests WHERE id=1";

if (mysqli_query($conn1, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn1);
}

mysqli_close($conn1);

echo "<br>";

// MySQLi Object-Oriented

// Create connection
$conn2 = new mysqli($servername, $username, $password, $dbname2);
// Check connection
if ($conn2->connect_error) {
  die("Connection failed: " . $conn2->connect_error);
}

$sql = "DELETE FROM MyGuests WHERE id=1";

if ($conn2->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn2->error;
}

$conn2->close();