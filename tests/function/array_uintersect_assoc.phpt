--TEST--
Function -- array_uintersect_assoc
--SKIPIF--
<?php if (function_exists('array_uintersect_assoc')) { echo 'skip'; } ?>
--FILE--
<?php
require_once 'PHP/Compat.php';
PHP_Compat::loadFunction('array_uintersect_assoc');

?>
--EXPECT--
