--TEST--
Function -- array_change_key_case
--SKIPIF--
<?php if (function_exists('array_change_key_case')) { echo 'skip'; } ?>
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('array_change_key_case');

// The array
$input_array = array("FirSt" => 1, "SecOnd" => 4);

// Default to lower
print_r(array_change_key_case($input_array));

// Lower
print_r(array_change_key_case($input_array, CASE_LOWER));

// Upper
print_r(array_change_key_case($input_array, CASE_UPPER));
?>
--EXPECT--
Array
(
    [first] => 1
    [second] => 4
)
Array
(
    [first] => 1
    [second] => 4
)
Array
(
    [FIRST] => 1
    [SECOND] => 4
)