--TEST--
PHP_Compat str_ireplace() -- Search as array, Replace as string
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('str_ireplace');

$search = array('{ANIMAL}', '{OBJECT}', '{THING}');
$replace = 'frog';
$subject = 'The {animal} jumped over the {object} and the {thing}...';

echo str_ireplace($search, $replace, $subject);
?>
--EXPECT--
The frog jumped over the frog and the frog...