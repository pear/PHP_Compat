--TEST--
PHP_Compat STDOUT
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadConstant('STDOUT');

if (defined('STDOUT')) {
    echo 'true';
}
?>
--EXPECT--
true