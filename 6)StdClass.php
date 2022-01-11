<?php
/*---------------------------
    Std Class Example
----------------------------*/

$str = '{"a": 1, "b": 2, "c": 3}';
$arr = json_decode($str, true); // set true for associative array

var_dump($arr);
echo $arr["a"]; // output: 1

$obj = json_decode($str);
var_dump($obj); // std class object
echo $obj->c; // Output: 3

/*--------------------------------
    Custom Std Class Example
----------------------------------*/

$stdObj = new \stdClass();
$stdObj->x = 10;
$stdObj->y = 20;

var_dump($stdObj);


/*--------------------------------
    Convert into object
----------------------------------*/
$arr2 = [10, 20, 30];
$obj2 = (object) $arr2;

echo $obj2->{1}; // Output: 20

$number = 5;
$obj3 = (object) $number;
echo $obj3->scalar;
