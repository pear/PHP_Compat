--TEST--
Function -- array_diff_key
--SKIPIF--
<?php if (function_exists('array_diff_key')) { echo 'skip'; } ?>
--FILE--
<?php
require_once 'PHP/Compat.php';
PHP_Compat::loadFunction('array_diff_key');

?>
--EXPECT--
