--TEST--
Function -- array_intersect_key
--SKIPIF--
<?php if (function_exists('array_intersect_key')) { echo 'skip'; } ?>
--FILE--
<?php
require_once 'PHP/Compat.php';
PHP_Compat::loadFunction('array_intersect_key');

?>
--EXPECT--
