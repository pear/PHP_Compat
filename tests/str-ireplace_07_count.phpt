--TEST--
PHP_Compat str_ireplace() -- Test count passed as reference
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('str_ireplace');

$search = '{OBJECT}';
$replace = 'fence';
$subject = 'The {object} jumped over the {object}';

str_ireplace($search, $replace, $subject, $count);
echo $count;
?>
--EXPECT--
2