--TEST--
Function -- array_intersect_assoc
--SKIPIF--
<?php if (function_exists('array_intersect_assoc')) { echo 'skip'; } ?>
--FILE--
<?php
require_once 'PHP/Compat.php';
PHP_Compat::loadFunction('array_intersect_assoc');

?>
--EXPECT--
