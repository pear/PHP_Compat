--TEST--
PHP_Compat PATH_SEPERATOR
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadConstant('PATH_SEPERATOR');

if (defined('PATH_SEPERATOR')) {
    echo 'true';
}
?>
--EXPECT--
true