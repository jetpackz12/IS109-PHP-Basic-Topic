<?php

class Fruit
{
    // Properties
    public $name;
    public $color;
    
    // The __construct() Function
    function __construct($name)
    {
        $this->name = $name;
    }

    // Methods
    function set_name($name)
    {
        $this->name = $name;
    }

    function get_name()
    {
        return $this->name;
    }

    function set_color($color)
    {
        $this->color = $color;
    }

    function get_color()
    {
        return $this->color;
    }
}


$apple = new Fruit('Apple');
$banana = new Fruit('Banana');

echo $apple->get_name();
echo "<br>";

echo $banana->get_name();
echo "<br>";

// Class Constants
class Goodbye {
  const LEAVING_MESSAGE = "Thank you for visiting W3Schools.com!";

  public function byebye() {
    echo self::LEAVING_MESSAGE; // Calling the constant property inside the function
  }
}

echo Goodbye::LEAVING_MESSAGE; // Calling the constant property
echo "<br>";

$goodbye = new Goodbye();
$goodbye->byebye();
echo "<br>";


// Static Properties
class pi {
  public static $value = 3.14159;

  public function staticValue() {
    return self::$value; // Calling the static property inside the function
  }
}

// Get static property
echo pi::$value; // Calling the static property
echo "<br>";

$pi = new pi();
echo $pi->staticValue();


?>