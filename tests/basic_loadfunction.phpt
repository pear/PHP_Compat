--TEST--
PHP_Compat::loadFunction() -- load invalid and valid function
--FILE--
<?php
require_once ('PHP/Compat.php');
$res = PHP_Compat::loadFunction('invalid');
echo ($res === false) ? 'false' : 'true', "\n";

$res = PHP_Compat::loadFunction('str_split');
echo ($res === false) ? 'false' : 'true';
?>
--EXPECT--
false
true