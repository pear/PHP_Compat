--TEST--
Function -- mhash
--FILE--
<?php
require_once 'PHP/Compat/Function/mhash.php';

$input = "what do ya want for nothing?";

$hash = php_compat_mhash(MHASH_MD5, $input);
echo bin2hex($hash) . "\n";

$hash = php_compat_mhash(MHASH_MD5, $input, "Jefe");
echo bin2hex($hash) . "\n";
?>
--EXPECT--
ae2e4b39f3b5ee2c8b585994294201ea
750c783e6ab0b503eaa86e310a5db738