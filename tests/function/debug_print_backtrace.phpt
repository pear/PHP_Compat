--TEST--
Function -- debug_print_backtrace
--FILE--
<?php
require_once 'PHP/Compat/Function/debug_print_backtrace.php';

echo 'test';
?>
--EXPECT--
test