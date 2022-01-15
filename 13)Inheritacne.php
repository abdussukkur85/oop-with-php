<?php
/*-------------------------------------------------------------------------------------
    Inheritance in PHP:
        Inheritance is an important pillar of OOP(Object oriented Programming).
        It is the mechanism which one class is allowed to inherit the fields and methods
        of another class.

        Short Summary of Inheritance:
            1) We can access public and protected properties constants and methods
                of the superclass.
            2) To override public and private properties and constant of the superclass,
                we've to to use the same or higher visibility
            3) Constructor method are optional they are called in the background
            4) We need to call parent::__construct when we override the constructor method
            
---------------------------------------------------------------------------------------*/

/*--------------------------------------------
    Inheritance Example
---------------------------------------------*/

class Fruit {
    public $name;
    public $color;
    public function __construct($name, $color) {
        $this->name = $name;
        $this->color = $color;
    }
    public function intro() {
        echo "The fruit is {$this->name} and the color is {$this->color}.";
    }
}

// Strawberry is inherited from Fruit
class Strawberry extends Fruit {
    public function message() {
        echo "Am I a fruit or a berry? ";
    }
}
$strawberry = new Strawberry("Strawberry", "red");
$strawberry->message();
$strawberry->intro();


/*-----------------------------------------------------
    PHP - Inheritance and the Protected Access Modifier
--------------------------------------------------------*/

class Fruit {
    public $name;
    public $color;
    public function __construct($name, $color) {
        $this->name = $name;
        $this->color = $color;
    }
    protected function intro() {
        echo "The fruit is {$this->name} and the color is {$this->color}.";
    }
}

class Strawberry extends Fruit {
    public function message() {
        echo "Am I a fruit or a berry? ";
    }
}

// Try to call all three methods from outside class
$strawberry = new Strawberry("Strawberry", "red");  // OK. __construct() is public
$strawberry->message(); // OK. message() is public
$strawberry->intro(); // ERROR. intro() is protected


/*-----------------------------------------------------
    PHP - Overriding Inherited Methods
--------------------------------------------------------*/

class Fruit {
    public $name;
    public $color;
    public function __construct($name, $color) {
        $this->name = $name;
        $this->color = $color;
    }
    public function intro() {
        echo "The fruit is {$this->name} and the color is {$this->color}.";
    }
}

class Strawberry extends Fruit {
    public $weight;
    public function __construct($name, $color, $weight) {
        $this->name = $name;
        $this->color = $color;
        $this->weight = $weight;
    }
    public function intro() {
        echo "The fruit is {$this->name}, the color is {$this->color}, and the weight is {$this->weight} gram.";
    }
}

$strawberry = new Strawberry("Strawberry", "red", 50);
$strawberry->intro();


/*---------------------------------------
    PHP - The final Keyword
-----------------------------------------*/

final class Fruit {
}

class Strawberry extends Fruit { // Fatal error
}


/*---------------------------------------
    Method overriding prevented
-----------------------------------------*/
class Fruit {
    final public function intro() {
        // some code
    }
}

class Strawberry extends Fruit {
    // will result in error
    public function intro() {
        // some code
    }
}
