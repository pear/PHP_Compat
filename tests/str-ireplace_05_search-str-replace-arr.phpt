--TEST--
PHP_Compat str_ireplace() -- Search as string, replace as array
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('str_ireplace');

$search = '{object}';
$replace = array('cat', 'dog', 'tiger');
$subject = 'The dog jumped over the {object}';

echo @sstr_ireplace($search, $replace, $subject);
?>
--EXPECT--
The dog jumped over the Array