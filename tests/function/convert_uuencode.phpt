--TEST--
Function -- convert_uuencode
--SKIPIF--
<?php if (function_exists('convert_uuencode')) { echo 'skip'; } ?>
--FILE--
<?php
require_once 'PHP/Compat.php';
PHP_Compat::loadFunction('convert_uuencode');

?>
--EXPECT--
