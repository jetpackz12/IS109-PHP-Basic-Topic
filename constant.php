<?php

// Define() Function

define("GREETING", "Welcome to W3Schools.com!");
echo GREETING;
echo "<br>";

function myTest() {
  define("GREETING1", "Welcome to W3Schools.com!22222");
}

myTest();

echo GREETING1;
echo "<br>";

// Array Using define()
define("CARS", array("Volvo", "BMW", "Toyota"));
echo CARS[0];
echo "<br>";

// Const Keyword

const GREETING2 = "Welcome to W3Schools.com!";
echo GREETING2;
echo "<br>";

// Array Using const
const ANIMALS = array("Cat", "Dog", "Horse");
echo ANIMALS[1];
echo "<br>";

?>