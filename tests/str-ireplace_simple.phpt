--TEST--
Function -- str_ireplace -- simple
--SKIPIF--
<?php if (function_exists('str_ireplace')) { echo 'skip'; } ?>
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('str_ireplace');

$search = '{object}';
$replace = 'fence';
$subject = 'The dog jumped over the {object}';

echo str_ireplace($search, $replace, $subject);
?>
--EXPECT--
The dog jumped over the fence