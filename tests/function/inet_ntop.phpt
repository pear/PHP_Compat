--TEST--
Function -- inet_ntop
--SKIPIF--
<?php if (function_exists('inet_ntop')) { echo 'skip'; } ?>
--FILE--
<?php
require_once 'PHP/Compat.php';
PHP_Compat::loadFunction('inet_ntop');

echo 'test';
?>
--EXPECT--
test