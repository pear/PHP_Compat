--TEST--
Function -- array_udiff_uassoc
--SKIPIF--
<?php if (function_exists('array_udiff_uassoc')) { echo 'skip'; } ?>
--FILE--
<?php
require_once 'PHP/Compat.php';
PHP_Compat::loadFunction('array_udiff_uassoc');

?>
--EXPECT--
