--TEST--
Function -- array_walk_recursive
--FILE--
<?php
require_once 'PHP/Compat/Function/array_walk_recursive.php';

$sweet = array('a' => 'apple', 'b' => 'banana');
$fruits = array('sweet' => $sweet, 'sour' => 'lemon');

function test_print($item, $key)
{
   echo "$key holds $item\n";
}

php_compat_array_walk_recursive($fruits, 'test_print');
?>
--EXPECT--
a holds apple
b holds banana
sour holds lemon