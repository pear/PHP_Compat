--TEST--
Function -- array_intersect_uassoc
--SKIPIF--
<?php if (function_exists('array_intersect_uassoc')) { echo 'skip'; } ?>
--FILE--
<?php
require_once 'PHP/Compat.php';
PHP_Compat::loadFunction('array_intersect_uassoc');

?>
--EXPECT--
