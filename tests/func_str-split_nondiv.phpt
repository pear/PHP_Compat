--TEST--
PHP_Compat str_split() -- with a non-divisable string
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('str_split');

$str = "abcd";
$arr = str_split($str, 3);

print_r($arr);
?>
--EXPECT--
Array
(
    [0] => abc
    [1] => d
)