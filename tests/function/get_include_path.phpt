--TEST--
Function -- get_include_path
--SKIPIF--
<?php if (function_exists('get_include_path')) { echo 'skip'; } ?>
--FILE--
<?php
require_once 'PHP/Compat.php';
PHP_Compat::loadFunction('get_include_path');

?>
--EXPECT--
