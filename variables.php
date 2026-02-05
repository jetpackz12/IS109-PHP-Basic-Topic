<?php

include_once "car.php";

$x = 5;
$y = "John";

$number = 5;
$name = "John";

$age = 24;
$AGE = 24;

$txt = "W3Schools.com";
echo "I love $txt!";

$txt = "W3Schools.com";
echo 'I love ' . $txt . '!<br><br>';

$s = "string"; //string (text values)
var_dump($s);
echo "<br>";
$i = 1; //int (whole numbers)
var_dump($i);
echo "<br>";
$f = 1.0; //float (decimal numbers)
var_dump($f);
echo "<br>";
$b = false; //bool (true or false)
var_dump($b);
echo "<br>";
$a = array("Volvo","BMW","Toyota"); //array (multiple values)
var_dump($a);
echo "<br>";
$object = new Car("blue", "Volvo"); //object (stores data as objects)
var_dump($object);
echo "<br>";



echo $object->message();

echo "<br>";
$n = null;// null (empty variable)
var_dump($n);
echo "<br>";

// resource (holds a reference to an external resource) special resource data type is not an actual data type.
$conn = mysqli_connect("localhost", "root", "admin", "tpce");

var_dump($conn);
echo "<br>";

function showValue(mixed $value): mixed { // mixed (any value)
    return $value;
}

var_dump(showValue(100));
echo "<br>";
var_dump(showValue("PHP"));
echo "<br>";
var_dump(showValue([1,2,3]));

?>