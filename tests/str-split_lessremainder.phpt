--TEST--
Function -- str_split -- string that has a remainder less than the chunk size
--SKIPIF--
<?php if (function_exists('str_split')) { echo 'skip'; } ?>
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