--TEST--
PHP_Compat strripos() -- with an offset
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('strripos');

$haystack = 'Cat Dog Lion Mouse Dog Sheep Wolf Cat Dog';
$needle  = 'DOG';

var_dump(strripos($haystack, $needle, 3));
var_dump(strripos($haystack, $needle, 30));
var_dump(strripos($haystack, $needle, 45));
var_dump(strripos($haystack, $needle, -1));
var_dump(strripos($haystack, $needle, -10));
var_dump(strripos($haystack, $needle, -30));
var_dump(strripos($haystack, $needle, -40));
?>
--EXPECT--
int(34)
int(34)
bool(false)
int(34)
int(4)
int(4)
bool(false)