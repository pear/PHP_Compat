--TEST--
Function -- array_walk_recursive
--SKIPIF--
<?php if (function_exists('array_walk_recursive')) { echo 'skip'; } ?>
--FILE--
<?php
require_once 'PHP/Compat.php';
PHP_Compat::loadFunction('array_walk_recursive');

?>
--EXPECT--
