--TEST--
PHP_Compat scandir() -- simple
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('scandir');

$dir    = '/tmp';
$files  = scandir($dir);

if (is_array($files)) {
    echo 'true';
}
?>
--EXPECT--
true