<?php
/*
 Constructor: Once the object is initialized, the constructor is automatically called. 
 Destructor: Destructors are for destroying objects and automatically called at the end of execution
 */
class Transaction {
    public float $amount;
    public string $description;

    public function __construct(float $amount, string $description) {
        $this->amount = $amount;
        $this->description = $description;
    }

    public function __destruct() {
        echo "Destructed calling...";
    }
}

$transaction = new Transaction(15, 'Description');
