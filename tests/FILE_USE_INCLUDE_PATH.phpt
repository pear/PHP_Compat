--TEST--
PHP_Compat FILE_USE_INCLUDE_PATH
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadConstant('FILE_USE_INCLUDE_PATH');

if (defined('FILE_USE_INCLUDE_PATH')) {
    echo 'true';
}
?>
--EXPECT--
true