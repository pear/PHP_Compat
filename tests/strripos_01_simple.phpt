--TEST--
PHP_Compat strripos() -- simple
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('strripos');

$haystack = 'Cat Dog Lion Mouse Sheep Wolf Cat Dog';
$needle  = 'DOG';

echo strripos($haystack, $needle, 3);
?>
--EXPECT--
34