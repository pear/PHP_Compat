--TEST--
PHP_Compat E_STRICT
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadConstant('E_STRICT');

if (defined('E_STRICT')) {
    echo 'true';
}
?>
--EXPECT--
true