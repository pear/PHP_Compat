--TEST--
Function -- convert_uudecode
--SKIPIF--
<?php if (function_exists('convert_uudecode')) { echo 'skip'; } ?>
--FILE--
<?php
require_once 'PHP/Compat.php';
PHP_Compat::loadFunction('convert_uudecode');

?>
--EXPECT--
