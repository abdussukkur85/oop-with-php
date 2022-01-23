<?php
/*-------------------------------------------------------------------------------------
    what is polymorphism? 
        In programming languages and type theory, polymorphism is the provision of a single interface to entities of different types or the use of a single symbol to represent multiple different types.The concept is borrowed from a principle in biology where an organism or species can have many different forms or stages.
            
---------------------------------------------------------------------------------------*/

// Interface Example
interface Processor {
    public function process(Food $obj);
}

class Food {
    public $name;
    public function __construct($name) {
        $this->name = $name;
    }

    public function process(Processor $process) {
        return $process->process($this);
    }
}

class Make implements Processor {
    public function process(Food $obj) {
        return $obj->name . " Making completed";
    }
}
class Serve implements Processor {
    public function process(Food $obj) {
        return $obj->name . " Serve completed";
    }
}
class Trashed implements Processor {
    public function process(Food $obj) {
        return $obj->name . " Trashed completed";
    }
}

$pizza = new Food("Pizza");
$task = new Make();
echo $pizza->process($task);


// Another Example of interface

interface ShapeExample {
    public function calcArea();
}

class SquareExample implements ShapeExample {
    private $side;
    public function __construct($side) {
        $this->side = $side;
    }

    public function calcArea() {
        return $area = $this->side * $this->side;
    }
}

class RectangleExample implements ShapeExample {
    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->height = $height;
        $this->width = $width;
    }

    public function calcArea() {
        return $area = $this->width * $this->height;
    }
}
