--TEST--
Function -- str_ireplace -- All params as arrays
--SKIPIF--
<?php if (function_exists('str_ireplace')) { echo 'skip'; } ?>
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('str_ireplace');

$search = array('{ANIMAL}', '{OBJECT}', '{THING}');
$replace = array('frog', 'gate', 'beer');
$subject = array('A {animal}', 'The {object}', 'My {thing}');

print_r(str_ireplace($search, $replace, $subject));
?>
--EXPECT--
Array
(
    [0] => A frog
    [1] => The gate
    [2] => My beer
)