<?php 

require_once 'db_connection.php';

// MySQLi Procedural

// Create database
$sql = "CREATE DATABASE myDB1";
if (mysqli_query($conn1, $sql)) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . mysqli_error($conn1);
}

mysqli_close($conn1);

echo "<br>";

// MySQLi Object-Oriented

// Create database
$sql = "CREATE DATABASE myDB2";
if ($conn2->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn2->error;
}

$conn2->close();