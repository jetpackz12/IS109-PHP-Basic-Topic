<?php

include_once "car.php";

echo "<h1>Cast to String</h1>";

$a = 5;       // Integer
$b = 5.34;    // Float
$c = "hello"; // String
$d = true;    // Boolean
$e = NULL;    // NULL

$a = (string) $a;
$b = (string) $b;
$c = (string) $c;
$d = (string) $d;
$e = (string) $e;

// Use var_dump() to verify the data type
var_dump($a); 
echo "<br>";
var_dump($b); 
echo "<br>";
var_dump($c); 
echo "<br>";
var_dump($d); 
echo "<br>";
var_dump($e); 
echo "<br><hr>";


echo "<h1>Cast to Integer</h1>";

$a = 5;       // Integer
$b = 5.34;    // Float
$c = "25 km"; // String
$d = "km 25"; // String
$e = "hello"; // String
$f = true;    // Boolean
$g = NULL;    // NULL

$a = (int) $a;
$b = (int) $b;
$c = (int) $c;
$d = (int) $d;
$e = (int) $e;
$f = (int) $f;
$g = (int) $g;

// Use var_dump() to verify the data type
var_dump($a); 
echo "<br>";
var_dump($b); 
echo "<br>";
var_dump($c); 
echo "<br>";
var_dump($d); 
echo "<br>";
var_dump($e); 
echo "<br>";
var_dump($f); 
echo "<br>";
var_dump($g); 
echo "<br><hr>";


echo "<h1>Cast to Float</h1>";

$a = 5;       // Integer
$b = 5.34;    // Float
$c = "25 km"; // String
$d = "km 25"; // String
$e = "hello"; // String
$f = true;    // Boolean
$g = NULL;    // NULL

$a = (float) $a;
$b = (float) $b;
$c = (float) $c;
$d = (float) $d;
$e = (float) $e;
$f = (float) $f;
$g = (float) $g;

// Use var_dump() to verify the data type
var_dump($a); 
echo "<br>";
var_dump($b); 
echo "<br>";
var_dump($c); 
echo "<br>";
var_dump($d); 
echo "<br>";
var_dump($e); 
echo "<br>";
var_dump($f); 
echo "<br>";
var_dump($g); 
echo "<br><hr>";


echo "<h1>Cast to Boolean</h1>";

$a = 5;       // Integer
$b = 5.34;    // Float
$c = 0;       // Integer
$d = -1;      // Integer
$e = 0.1;     // Float
$f = "hello"; // String
$g = "";      // String
$h = true;    // Boolean
$i = NULL;    // NULL

$a = (bool) $a;
$b = (bool) $b;
$c = (bool) $c;
$d = (bool) $d;
$e = (bool) $e;
$f = (bool) $f;
$g = (bool) $g;
$h = (bool) $h;
$i = (bool) $i;

// Use var_dump() to verify the data type
var_dump($a); 
echo "<br>";
var_dump($b); 
echo "<br>";
var_dump($c); 
echo "<br>";
var_dump($d); 
echo "<br>";
var_dump($e); 
echo "<br>";
var_dump($f); 
echo "<br>";
var_dump($g); 
echo "<br>";
var_dump($h); 
echo "<br>";
var_dump($i); 
echo "<br><hr>";


echo "<h1>Cast to Array</h1>";

$a = 5;       // Integer
$b = 5.34;    // Float
$c = "hello"; // String
$d = true;    // Boolean
$e = NULL;    // NULL

$a = (array) $a;
$b = (array) $b;
$c = (array) $c;
$d = (array) $d;
$e = (array) $e;

// Use var_dump() to verify the data type
var_dump($a); 
echo "<br>";
var_dump($b); 
echo "<br>";
var_dump($c); 
echo "<br>";
var_dump($d); 
echo "<br>";
var_dump($e); 
echo "<br>";

$myCar = new Car("red", "Volvo");
$myCar = (array) $myCar;
var_dump($myCar); 
echo "<br><hr>";

echo "<h1>Cast to Object</h1>";

$a = 5;       // Integer
$b = 5.34;    // Float
$c = "hello"; // String
$d = true;    // Boolean
$e = NULL;    // NULL

$a = (object) $a;
$b = (object) $b;
$c = (object) $c;
$d = (object) $d;
$e = (object) $e;

// Use var_dump() to verify the data type
var_dump($a); 
echo "<br>";
var_dump($b); 
echo "<br>";
var_dump($c); 
echo "<br>";
var_dump($d); 
echo "<br>";
var_dump($e); 
echo "<br>";

$a = array("Volvo", "BMW", "Toyota");  // indexed array
$b = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");  // associative array

$a = (object) $a;
$b = (object) $b;
var_dump($a); 
echo "<br>";
var_dump($b); 
echo "<br>";


?>