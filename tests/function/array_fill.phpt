--TEST--
Function -- array_fill
--FILE--
<?php
require_once 'PHP/Compat/Function/array_fill.php';
print_r(array_fill(5, 6, 'banana'));
?>
--EXPECT--
Array
(
   [5]  => banana
   [6]  => banana
   [7]  => banana
   [8]  => banana
   [9]  => banana
   [10] => banana
)