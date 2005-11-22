--TEST--
Function -- property_exists
--SKIPIF--
<?php if (function_exists('property_exists')) { echo 'skip'; } ?>
--FILE--
<?php
require_once 'PHP/Compat.php';
PHP_Compat::loadFunction('property_exists');

echo 'test';
?>
--EXPECT--
test