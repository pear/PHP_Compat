--TEST--
Method -- PHP_Compat::loadConstant -- load invalid and valid function
--FILE--
<?php
require_once ('PHP/Compat.php');
$res = PHP_Compat::loadConstant('invalid');
echo ($res === false) ? 'false' : 'true', "\n";

$res = PHP_Compat::loadConstant('E_STRICT');
echo ($res === false) ? 'false' : 'true';
?>
--EXPECT--
false
true