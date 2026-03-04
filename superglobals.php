<?php
// PHP $GLOBALS - Global Variables
$x = 75;
$y = 90;

function myfunction()
{
    global $y;
    echo $GLOBALS['x'];
    echo "<br>";
    echo $y;
}

myfunction();

echo "<br><hr>";

// PHP $_SERVER
echo " PHP_SELF: " . $_SERVER['PHP_SELF'];
echo "<br>";
echo " SERVER_NAME: " . $_SERVER['SERVER_NAME'];
echo "<br>";
echo " HTTP_HOST: " . $_SERVER['HTTP_HOST'];
echo "<br>";
echo " HTTP_REFERER: " . $_SERVER['HTTP_REFERER'];
echo "<br>";
echo " HTTP_USER_AGENT: " . $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo " SCRIPT_NAME: " . $_SERVER['SCRIPT_NAME'];

// You can check here lists of the most important elements that can go 
// inside $_SERVER https://www.w3schools.com/php/php_superglobals_server.asp

echo "<br><hr>";