--TEST--
PHP_Compat str_split() -- with a chunk size specified
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('str_split');

$str = "Hello Friend";
$arr = str_split($str, 3);

print_r($arr);
?>
--EXPECT--
Array
(
    [0] => Hel
    [1] => lo 
    [2] => Fri
    [3] => end
)