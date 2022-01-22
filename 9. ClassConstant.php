<?php
/*--------------------------------
    Class constant in PHP
---------------------------------*/

class Transaction {
    public const STATUS_PAID = 'Paid';
    public const STATUS_PENDING = 'Pending';
    public const STATUS_DECLINED = 'Declined';
}

// Access Class Constant
$transaction = new Transaction;
echo $transaction::STATUS_DECLINED; // Output: Declined
echo $transaction::STATUS_PAID; // Output: 


/*----------------------------------------
    Access Constant property within class
-----------------------------------------*/
class Transaction {
    public const STATUS_PAID = 'Paid';
    public const STATUS_PENDING = 'Pending';
    public const STATUS_DECLINED = 'Declined';

    public function __construct() {
        var_dump(self::STATUS_PAID);
    }
}
