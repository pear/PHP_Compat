--TEST--
PHP_Compat stripos() -- with an offset
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('stripos');

$haystack = 'Cat Dinner Dog Lion Mouse Sheep Wolf Cat Dog';
$needle  = 'DOG';

var_dump(stripos($haystack, $needle, 4));
var_dump(stripos($haystack, $needle, 10));
var_dump(stripos($haystack, $needle, 15));
?>
--EXPECT--
int(11)
int(11)
int(41)