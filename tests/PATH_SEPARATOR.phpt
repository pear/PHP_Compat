--TEST--
PHP_Compat PATH_SEPARATOR
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadConstant('PATH_SEPARATOR');

strtoupper(substr(PHP_OS, 0, 3) == 'WIN') ?
        ';' :
        ':');

echo (PATH_SEPARATOR == ';' || PATH_SEPARATOR == ':') ?
        'true' :
        'false';
?>
--EXPECT--
true