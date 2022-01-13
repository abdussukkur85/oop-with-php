<?php
/*--------------------------------------------------------------------------
    Static properties and methods in PHP
        In a PHP class, properties and methods declared with static keyword
        cannot be accessed by its object with the help of -> operator. 
        In fact, object is not required to access any instance of class. 
        Default visibility of static items in a class is public
------------------------------------------------------------------------------*/

/*----------------------------------------
    Static properties
-----------------------------------------*/
class Student {
    public static $name = "Rony";
}

$student = new Student;
$studentClass = 'Student';
echo $student::$name;
echo Student::$name;
echo $studentClass::$name;


/*--------------------------------------------------------------
    Access Static properties inside any method of the same class
----------------------------------------------------------------*/
class Transaction {
    public static int $count = 0;
    public function __construct() {
        self::$count++;
    }
}

$transaction = new Transaction();
$transaction = new Transaction();
$transaction = new Transaction();
$transaction = new Transaction();
$transaction = new Transaction();

echo Transaction::$count; // output: 5


/*---------------------------------------------
    Access Static properties form child class 
----------------------------------------------*/
class MyClass1 {
    public static $name = "Kawsar";
}
class MyClass2 extends MyClass1 {
    public function __construct() {
        echo parent::$name;
    }
}
$obj = new MyClass2();


/*-------------------------------
    Static properties
---------------------------------*/
class TestClass {
    static $count = 0;
    function __construct() {
        self::$count++;
    }
    static function showCount() {
        echo "count = " . self::$count;
    }
}
$a = new TestClass();
$b = new TestClass();
$c = new TestClass();
TestClass::showCount();
