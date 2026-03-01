<?php 
// declare(strict_types=1);

function myMessage() {
  echo "Hello world!<br>";
}

myMessage();

// Function Parameters

function familyName($fname) {
  echo "$fname Refsnes.<br>";
}

familyName("Jani");
familyName("Hege");

function familyName2($fname, $year) {
  echo "$fname Refsnes. Born in $year.<br>";
}

familyName2("Hege", "1975");
familyName2("Stale", "1978");

// Default Parameter Value

function setHeight($height = 50) {
  echo "The height is : $height <br>";
}

setHeight(350);
setHeight(); 

// Functions - Returning values

function sum($x, $y) {
  $z = $x + $y;
  return $z;
}

echo "5 + 10 = " . sum(5, 10) . "<br>";
echo "7 + 13 = " . sum(7, 13) . "<br>";

// Passing Arguments by Reference

function add_five(&$value) {
  $value += 5;
}

$num = 2;
add_five($num);
echo $num;
echo "<br>";

// Variable Number of Parameters
function sumMyNumbers(...$x) {
  $n = 0;
  $len = count($x);
  for($i = 0; $i < $len; $i++) {
    $n += $x[$i];
  }
  return $n;
}

$a = sumMyNumbers(5, 2, 6, 2, 7, 7);
echo $a;
echo "<br>";

function myFamily($lastname, ...$firstname) {
  $txt = "";
  $len = count($firstname);
  for($i = 0; $i < $len; $i++) {
    $txt = $txt."Hi, $firstname[$i] $lastname.<br>";
  }
  return $txt;
}

$a = myFamily("Doe", "Jane", "John", "Joey");
echo $a;

//PHP is a Loosely Typed Language

function addNumbers($a, $b) {
  return $a + $b;
}
echo addNumbers(5, "5") . "<br>";

//Return Type Declarations

function addNumbers2($a, $b) : int {
  return $a + $b;
}
var_dump(addNumbers2(1.2, 5.2));

//Static Methods 

class greeting {
  public static function welcome() { // The Static Method
    echo "<br> Hello World!";
  }
}

// Call static method
greeting::welcome();

?>