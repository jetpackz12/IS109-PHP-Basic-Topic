<?php

// Creating Arrays
$cars = array("Volvo", "BMW", "Toyota");

$cars = ["Volvo", "BMW", "Toyota"];

$cars = [
  "Volvo",
  "BMW",
  "Toyota"
];

// Indexed Arrays
$cars = array("Volvo", "BMW", "Toyota");

foreach ($cars as $car) {
  echo "$car <br>";
}

echo "<br>";

// Associative Arrays
$car = array("brand"=>"Ford", "model"=>"Mustang", "year"=>1964);
foreach ($car as $key => $value) {
  echo "$key: $value <br>";
}

echo "<br>";

// Multidimensional Arrays
$cars = array (
  array("Volvo",22,18),
  array("BMW",15,13),
  array("Saab",5,2),
  array("Land Rover",17,15)
);

echo "<table>";
echo "<tr><th>Brand</th><th>Stock</th><th>Sold</th></tr>";

foreach ($cars as $row) {
    echo "<tr>";
    foreach ($row as $cell) {
        echo "<td>" . $cell . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

echo "<br>";

// Array with function and dataype.
$person = [
    'fname' => "Joseph Jett",
    'mname' => "T.",
    'lname' => "Abela",
    'message' => function($programing_language) {
        return "Are you having fun learning $programing_language?";
    }
];

echo $person['fname']. " " .$person['mname']. " " .$person['lname'];
echo "<br>";
echo $person['message']("PHP");

?>