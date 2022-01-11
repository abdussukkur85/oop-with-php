<?php
/*----------------------------------
    Constructor property promotion
------------------------------------*/

// Before
class EmailController {
    private MailService $mailService;
    private UserRepository $users;

    public function __construct(MailService $mailService, UserRepository $users) {
        $this->mailService = $mailService;
        $this->users = $users;
    }
}

// now you can do this (apply constructor property promotion)
class EmailController {

    public function __construct(private MailService $mailService, private UserRepository $users) {
    }
}


/*----------------------------------------------------
    Another Example of Constructor property promotion
-----------------------------------------------------*/

class CustomerDTO {
    public string $name;
    public string $email;
    public DateTimeImmutable $birth_date;

    public function __construct(string $name, string $email, DateTimeImmutable $birth_date) {
        $this->name = $name;
        $this->email = $email;
        $this->birth_date = $birth_date;
    }
}

// Apply Constructor property promotion
class CustomerDTO {

    public function __construct(
        public string $name,
        public string $email,
        DateTimeImmutable $birth_date
    ) {
    }
}

// **** No Duplicate Allow ****
class MyClass {
    public string $a;
    public function __construct(public string $a) {
    }
}

// **** Untyped properties are allowed ****
class MyDTO {
    public function __construct(public $name) {
    }
}

/*----------------------------------------------------
    Simple Defaults:
        promote properties can have defaults values, 
        but expression like now are not allowed
-----------------------------------------------------*/
class MyClass {
    public function __construct(
        public string $name = "Rony", // allowed
        public DateTimeImmutable $date = new DateTimeImmutable() // not allowed

    ) {
    }
}


/*----------------------------------------------------
    Combined promoted and normal properties:
        not all constructor properties should be promoted
        you can mix and match
-----------------------------------------------------*/

class MyClass {
    public string $description;
    public function __construct(public string $name, string $description) {
        $this->description = $description;
    }
}

// **** Access promoted properties from the constructor body ****

class MyClass {
    public function __construct(public int $age) {
        if ($this->age > 15) {
            throw new InvalidArgumentException("not valid age");
        }
    }
}

// **** Doc comment are allowed on promoted properties ****

class MyClass {
    public function __construct(
        /**@var integer */
        public int $age
    ) {
    }
}

// **** Not allowed in abstract constructor ****
abstract class A {
    public function __construct(
        public int $age // not allowed
    ) {
    }
}

// **** Allowed in traits ****
trait MyTrait {
    public function __construct(
        public string $a // allowed
    ) {
    }
}

// **** Verdict parameter can't be promoted ****
class MyClass {
    public function __construct(
        /**@var integer */
        public int ...$invoice_id // not allowed
    ) {
    }
}
