--TEST--
Function -- array_intersect_ukey
--SKIPIF--
<?php if (function_exists('array_intersect_ukey')) { echo 'skip'; } ?>
--FILE--
<?php
require_once 'PHP/Compat.php';
PHP_Compat::loadFunction('array_intersect_ukey');

?>
--EXPECT--
