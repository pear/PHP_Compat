--TEST--
PHP_Compat E_STRICT
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadConstant('E_STRICT');

echo E_STRICT;
?>
--EXPECT--
2048