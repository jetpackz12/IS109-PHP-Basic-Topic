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

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Mary', 'Moe', 'mary@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Julie', 'Dooley', 'julie@example.com')";

if (mysqli_multi_query($conn1, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn1);
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

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Mary', 'Moe', 'mary@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Julie', 'Dooley', 'julie@example.com')";

if ($conn2->multi_query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn2->error;
}

$conn2->close();