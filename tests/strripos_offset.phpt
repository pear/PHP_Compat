--TEST--
PHP_Compat strripos() -- with an offset
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('strripos');

$haystack = 'Cat Dinner Dog Lion Mouse Sheep Wolf Cat Dog Donut';
$needle  = 'DOG';

var_dump(strripos($haystack, $needle, 3));
var_dump(strripos($haystack, $needle, 30));
var_dump(strripos($haystack, $needle, 50));
var_dump(strripos($haystack, $needle, -1));
var_dump(strripos($haystack, $needle, -10));
var_dump(strripos($haystack, $needle, -30));
var_dump(strripos($haystack, $needle, -50));
?>
--EXPECT--
int(41)
int(41)
bool(false)
int(41)
int(11)
int(11)
bool(false)