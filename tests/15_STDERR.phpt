--TEST--
PHP_Compat STDERR
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadConstant('STDERR');

if (defined('STDERR')) {
    echo 'true';
}
?>
--EXPECT--
true