--TEST--
Function -- restore_include_path
--SKIPIF--
<?php if (function_exists('restore_include_path')) { echo 'skip'; } ?>
--FILE--
<?php
require_once 'PHP/Compat.php';
PHP_Compat::loadFunction('restore_include_path');

?>
--EXPECT--
