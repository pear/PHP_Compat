--TEST--
PHP_Compat PATH_SEPARATOR
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadConstant('PATH_SEPARATOR');

if (defined('PATH_SEPARATOR')) {
    echo 'true';
}
?>
--EXPECT--
true