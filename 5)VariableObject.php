<?php
// Variable Object
declare(strict_types=1);

class Transaction {
    public float $amount;
    public string $description;

    public function __construct(float $amount, string $description) {
        $this->amount = $amount;
        $this->description = $description;
    }

    public function getAmount() {
        return $this->amount;
    }
    public function __destruct() {
        echo "Destructed calling...";
    }
}

$class = 'Transaction';
$transaction = new $class(20, 'description'); // variable object
echo $transaction->getAmount();
