--TEST--
PHP_Compat FILE_APPEND
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadConstant('FILE_APPEND');

if (defined('FILE_APPEND')) {
    echo 'true';
}
?>
--EXPECT--
true