--TEST--
PHP_Compat str_split() -- simple usage
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('str_split');

$str = "Hello Friend";
$arr = str_split($str);

print_r($arr);
?>
--EXPECT--
Array
(
    [0] => H
    [1] => e
    [2] => l
    [3] => l
    [4] => o
    [5] =>  
    [6] => F
    [7] => r
    [8] => i
    [9] => e
    [10] => n
    [11] => d
)