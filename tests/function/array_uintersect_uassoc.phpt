--TEST--
Function -- array_uintersect_uassoc
--SKIPIF--
<?php if (function_exists('array_uintersect_uassoc')) { echo 'skip'; } ?>
--FILE--
<?php
require_once 'PHP/Compat.php';
PHP_Compat::loadFunction('array_uintersect_uassoc');

?>
--EXPECT--
