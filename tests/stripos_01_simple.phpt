--TEST--
PHP_Compat stripos() -- simple
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('stripos');

$haystack = 'Cat Dog Lion Mouse Sheep Wolf Cat Dog';
$needle  = 'DOG';

echo stripos($haystack, $needle, 3);
?>
--EXPECT--
4