--TEST--
PHP_Compat STDIN
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadConstant('STDIN');

if (defined('STDIN')) {
    echo 'true';
}
?>
--EXPECT--
true