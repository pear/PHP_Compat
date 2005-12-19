--TEST--
Function -- md5_file
--FILE--
<?php
require_once 'PHP/Compat/Function/md5_file.php';

echo php_compat_md5_file(__FILE__);
?>
--EXPECT--
762a55bb01c6133a956599e6a51c49b0