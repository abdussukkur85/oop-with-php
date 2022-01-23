<?php
/*-------------------------------------------------------------------------------------
    Magic Methods in PHP:
        Magic methods are special method which override PHP's default action
        when the certain action are performed on an object
---------------------------------------------------------------------------------------*/


/*--------------------------------------------------------------
    __get(): Is utilized for reading data from inaccessible
            (protected or private) or non-existing properties
    
    __set(): Is run when writing data to inaccessible
            (protected or private) or non-existing properties
----------------------------------------------------------------*/
class Invoice {
    private $amount;
    public function __construct($amount) {
        $this->amount = $amount;
    }

    public function __get($name) {
        if (property_exists($this, $name)) {
            return $this->$name;
        }

        return null;
    }

    public function __set($name, $value) {
        if (property_exists($this, $name)) {
            $this->name = $value;
        }
    }
}

$invoice = new Invoice(10);
$invoice->amount = 10;

echo $invoice->amount; // Output: 10

/*-----------------------------------------
    Another Example of __get() and __set()
------------------------------------------*/

class Invoice2 {
    private $data = [];
    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __get($name) {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
    }
}

$invoice2 = new Invoice2();
$invoice2->amount = 150;
$invoice2->name = "Abdus Sukkur";
$invoice2->invoice_number = 12345;


echo $invoice2->amount . "<br>";
echo $invoice2->name . "<br>";
echo $invoice2->invoice_number . "<br>";


/*-----------------------------------------------------------------------
    __isset(): is triggered by calling isset() or empty() on inaccessible 
                (protected or private) or non-existing properties.
    
    __unset(): Is invoked when unset() is used on inaccessible
                (protected or private) or non-existing properties.
------------------------------------------------------------------------*/

class Invoice3 {
    private $data = [];
    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __isset($name) {
        var_dump('isset');
        return array_key_exists($name, $this->data);
    }

    public function __unset($name) {
        unset($this->data[$name]);
    }
}

$invoice3 = new Invoice3();
$invoice3->amount = 10;

var_dump(isset($invoice3->amount));

unset($invoice3->amount);

var_dump(isset($invoice3->amount));


/*------------------------------------------------------------------------------------
    __call(): Is triggered when invoking inaccessible methods in an object context.
    
    __callStatic(): Is triggered when invoking inaccessible methods in a static context.
----------------------------------------------------------------------------------------*/

class Invoice4 {
    // protected function process() {
    //     var_dump("process");
    // }
    public function __call($name, $arguments) {
        var_dump($name, $arguments);
    }

    public static function __callStatic($name, $arguments) {
        var_dump("static", $name, $arguments);
    }
}

$invoice4 = new Invoice3();
$invoice4->process(1, 2, 3);
$invoice4::processing(1, 2, 3);


/*------------------------------------------------------
    Another Example of __call() and __callStatic()
--------------------------------------------------------*/
class Invoice5 {
    protected function process($amount, $description) {
        var_dump($amount, $description);
    }
    public function __call($name, $arguments) {

        if (method_exists($this, $name)) {
            call_user_func_array([$this, $name], $arguments);
        }
    }

    public static function __callStatic($name, $arguments) {
        var_dump("static", $name, $arguments);
    }
}

$invoice5 = new Invoice5();
$invoice5->process(1, 2, 3, 4, 5);
$invoice5::processing(1, 2, 3);


/*--------------------------------------------------------------------
    __toString():
        The __toString() method allows a class to decide how it will react when it is treated like a string. 
        For example, what echo $obj; will print.
--------------------------------------------------------------------------*/

class TestClass {
    public $foo;

    public function __construct($foo) {
        $this->foo = $foo;
    }

    public function __toString() {
        return $this->foo;
    }
}

$class = new TestClass('Hello');
echo $class;


/*--------------------------------------------------------------------
    __invoke(): The __invoke() method is called when a script tries to call an object as a function.
--------------------------------------------------------------------------*/

class CallableClass {
    public function __invoke($x) {
        var_dump($x);
    }
}

$obj = new CallableClass;
$obj(5);    // int (5)
var_dump(is_callable($obj)); // bool(true)



/*--------------------------------------------------------------------
    __debugInfo(): This method is called by var_dump() when dumping an object to get the properties that should be shown.
    If the method isn't defined on an object, then all public, protected and private properties will be shown.
--------------------------------------------------------------------------*/

class UserInvoice {
    private float $amount;
    private int $id = 1;
    private string $accountNumber = "123456789";

    public function __debugInfo(): ?array {
        return [
            'id' => $this->id,
            'accountNumber' => "****" . substr($this->accountNumber, -4)
        ];
    }
}

$userInvoice = new UserInvoice();
var_dump($userInvoice);
