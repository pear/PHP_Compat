--TEST--
Function -- stripos -- simple
--SKIPIF--
<?php if (function_exists('stripos')) { echo 'skip'; } ?>
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('stripos');

$haystack = 'Cat Dinner Dog Lion Mouse Sheep Wolf Cat Dog';
$needle  = 'DOG';

echo stripos($haystack, $needle);
?>
--EXPECT--
11