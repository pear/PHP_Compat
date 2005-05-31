--TEST--
Function -- htmlspecialchars_decode
--SKIPIF--
<?php if (function_exists('htmlspecialchars_decode')) { echo 'skip'; } ?>
--FILE--
<?php
require_once 'PHP/Compat.php';
PHP_Compat::loadFunction('htmlspecialchars_decode');

echo 'test';
?>
--EXPECT--
test