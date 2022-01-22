<?php
/*--------------------------------------------------------------------------------------------------
    Null safe operator in php:
        If you have used the null coalescing operator in the past. You probably also notice its
        shortcoming : null coalescing doesn't work on method calls. Instead you need intermediate
        checks, or relay on optional helpers by some frameworks
---------------------------------------------------------------------------------------------------*/
$startDate = $booking->getStartDate();
$dateAsString = $startDate ? $startDate->asDateString() : null;


/*--------------------------------------------------------------------------------------------------
    The null safe operator provides functionality similar to null coalescing, but also support 
    methods calls. Instead of writing this
---------------------------------------------------------------------------------------------------*/

$country = null;
if ($session != null) {
    $user = $session->user;

    if ($user != null) {
        $address = $user->getAddress();

        if ($address != null) {
            $country = $address->country();
        }
    }
}
/* PHP 8 allows to write this */
$country = $session?->user?->getAddress()?->country;


/* Another Example of null safe operator */
class Post {
    public function __construct(private int $id) {
    }

    public function getTitle() {
        return "Post Title " . $this->id;
    }
}

function getPost(int $id): ?Post // union operator
{
    if ($id > 100) {
        return null;
    }
    return new Post($id);
}

// normally create object and get post title
$post = getPost(10);
if ($post != null) {
    echo $post->getTitle();
} else {
    echo "no post found";
}

// using null safe operator
$post = getPost(15);
echo $post?->getTitle() ?? "no post found";


/*------------------------------------------------
    Another Example of NULL safe operator
-------------------------------------------------*/
class Invoice {
    public function generatePDF() {
        return "generate PDF";
    }
}

class Order {
    private $invoice;
    public function generateInvoice() {
        $this->invoice = new Invoice();
    }

    public function getInvoice() {
        //return "yes";
        return $this->invoice->generatePDF();
    }
}

// $order = new Order();
// $order->generateInvoice();
// echo $order->getInvoice(); 

$order = new Order();
$order->generateInvoice();
echo $order?->getInvoice()  ?? "failed to generate PDF";
