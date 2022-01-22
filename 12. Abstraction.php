<?php 
/*------------------------------------------------------------------------
    Abstraction in PHP:
        Abstraction is the concept of object oriented programming that
        shows only essential attributes and hides unnecessary information.
        The main purpose of abstraction is hiding the necessary details from the users.
        Abstraction is selecting data form a larger pool to show only relevant details
        of the object to the users. It helps in the reducing programming complexity and efforts.
        Its is one of the most important concept of oops
----------------------------------------------------------------------------*/

abstract class Animal  {  
    public $name;  
    public $age;  
    public function Describe(){  
        return $this->name . ", " . $this->age . " years old";      
    } 
    
    abstract public function Greet();  
}  

class cat extends Animal{  
    public function Greet(){  
        return "Lion!";      
    }  
    public function Describe()  {  
        return parent::Describe() . ", and I'm a cat!";      
    }  
}  

$animal = new cat();  
$animal->name = "Seru";  
$animal->age = 5; 

echo $animal->Describe();  

echo $animal->Greet();
