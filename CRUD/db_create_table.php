<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname1 = "myDB1";
$dbname2= "myDB2";
$port = "3307";

// MySQLi Procedural

// Create connection
$conn1 = mysqli_connect($servername, $username, $password, $dbname1, $port);
// Check connection
if (!$conn1) {
  die("Connection failed: " . mysqli_connect_error());
}

// sql to create table
$sql = "CREATE TABLE MyGuests (
id INT(6) AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50)
)";

if (mysqli_query($conn1, $sql)) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn1);
}

mysqli_close($conn1);

echo "<br>";

// MySQLi Object-Oriented

// Create connection
$conn2 = new mysqli($servername, $username, $password, $dbname2, $port);
// Check connection
if ($conn2->connect_error) {
  die("Connection failed: " . $conn2->connect_error);
}

// sql to create table
$sql = "CREATE TABLE MyGuests (
id INT(6) AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50)
)";

if ($conn2->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn2->error;
}

$conn2->close();