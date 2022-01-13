<?php
/*----------------------------------------------------------------------------------------
    Encapsulation:
        Encapsulation is one of the fundamentals of OOP(Object Oriented Programming).
        It returns to the bundling of data with the methods that operate on the data.
        Encapsulation is used to hide the values or state of a Structure data object
        inside a class, preventing unauthorize parties(User) direct access to them.
        Publicly accessible methods are generally provide in the class
        (So-called fetter and setter) to access the values, and other client classes
        called these method to retrieve and modify the values within the object
-----------------------------------------------------------------------------------------*/

/*-------------------------------
    Encapsulation Example
---------------------------------*/

class ATM {
    private $customer_id;
    private $pin;

    public function pinChange($customerId, $pin) {
        /*------ Perform Task ---------*/
    }

    public function checkBalance($customerId, $pin) {
        /*------ Perform Task ---------*/
    }
    public function miniStatement($customerId) {
        /*------ Perform Task ---------*/
    }
}

$obj = new ATM();
$obj->checkBalance(21190301193, 123456);
