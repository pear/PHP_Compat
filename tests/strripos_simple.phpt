--TEST--
Function -- strripos -- simple
--SKIPIF--
<?php if (function_exists('strripos')) { echo 'skip'; } ?>
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('strripos');

$haystack = 'Cat Dog Lion Mouse Sheep Wolf Cat Dog';
$needle  = 'DOG';

echo strripos($haystack, $needle);
?>
--EXPECT--
34