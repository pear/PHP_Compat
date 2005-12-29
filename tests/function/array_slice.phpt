--TEST--
Function -- array_slice
--FILE--
<?php
require_once 'PHP/Compat/Function/array_slice.php';

$input = array("a", "b", "c", "d", "e");

$output = array_slice($input, 2);      
$output = array_slice($input, -2, 1); 
$output = array_slice($input, 0, 3);

print_r(array_slice($input, 2, -1));
print_r(array_slice($input, 2, -1, true));
?>
--EXPECT--
Array
(
    [0] => c
    [1] => d
)
Array
(
    [2] => c
    [3] => d
)