<?php
/*-------------------------------------------------------------------------------------
    Abstract class and methods:
        1) Can't Instantiate abstract class
        2) In abstract class can contain abstract method in addition to regular method and properties
        3) Abstract class does declare the abstract method but does not implement it.
            In other terms, it know what of the abstract method but not how of the abstract method
        4) Child class know how the abstract method
        5) The signature of the abstract method and child class method must be the same however 
            the abstract can have argument with default value
        6) Abstract class can have both abstract method and normal method
        7) Abstract method can't declare as private
            
---------------------------------------------------------------------------------------*/

abstract class Car {
    public $name;
    public function __construct($name) {
        $this->name = $name;
    }
    abstract public function intro(): string;
}

$car = new Car(); //Can't Instantiate abstract class


class Audi extends Car {
    public function intro(): string {
        return "Choose German quality! I'm an $this->name!";
    }
}

// Create objects from the child classes
$audi = new audi("Audi");
echo $audi->intro();
echo "<br>";
