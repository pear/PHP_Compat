--TEST--
Function -- array_uintersect
--SKIPIF--
<?php if (function_exists('array_uintersect')) { echo 'skip'; } ?>
--FILE--
<?php
require_once 'PHP/Compat.php';
PHP_Compat::loadFunction('array_uintersect');

?>
--EXPECT--
