<?php

$x = 5; // global scope

function myTest() {
  $x = 5; // local scope
  // using x inside this function will not work
  echo "Variable x inside function is: $x <br>";
}
myTest();

echo "Variable x outside function is: $x <br>";

// Static Scope

function myTest2() {
  static $x = 0; // static scope
  echo $x;
  $x++;
}

myTest2();
echo "<br>";
myTest2();
echo "<br>";
myTest2();
echo "<br>";

// Global Keyword

$x = 5;
$y = 10;

function myTest3() {
  global $x, $y;
  $y = $x + $y;
}

myTest3();
echo "<br>";
echo $y; // outputs 15
echo "<br>";

// $GLOBALS Superglobals. 

/*
Some predefined variables in PHP are "superglobals", which means that they are always accessible, regardless of scope - and you can access them from any function, class or file without having to do anything special.
*/
$x = 5;
$y = 10;

function myTest4() {
  $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y'];
}

myTest4();
echo $y; // outputs 15


?>