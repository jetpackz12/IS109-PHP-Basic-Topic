<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "";
$port = "3307";

// MySQLi Procedural

// Create connection
$conn1 = mysqli_connect($hostname, $username, $password, $database, $port);

// Check connection
if (!$conn1) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";


echo "<br>";


// MySQLi Object-Oriented

// Create connection
$conn2 = new mysqli($hostname, $username, $password, $database, $port);

// Check connection
if ($conn2->connect_error) {
  die("Connection failed: " . $conn2->connect_error);
}
echo "Connected successfully";
echo "<br>";