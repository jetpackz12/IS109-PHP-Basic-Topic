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

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = mysqli_query($conn1, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
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

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn2->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>ID</th><th>Name</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn2->close();