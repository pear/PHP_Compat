--TEST--
Function -- str_ireplace -- Search and Replace as arrays
--SKIPIF--
<?php if (function_exists('str_ireplace')) { echo 'skip'; } ?>
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('str_ireplace');

// Simple
$search = array('{ANIMAL}', '{OBJECT}');
$replace = array('frog', 'gate');
$subject = 'The {animal} jumped over the {object}';
echo str_ireplace($search, $replace, $subject), "\n";

// More in search
$search = array('{ANIMAL}', '{OBJECT}', '{THING}');
$replace = array('frog', 'gate');
$subject = 'The {animal} jumped over the {object} and the {thing}...';
echo str_ireplace($search, $replace, $subject), "\n";

// More in replace
$search = array('{ANIMAL}', '{OBJECT}');
$replace = array('frog', 'gate', 'door');
$subject = 'The {animal} jumped over the {object} and the {thing}...';
echo str_ireplace($search, $replace, $subject);
?>
--EXPECT--
The frog jumped over the gate
The frog jumped over the gate and the ...
The frog jumped over the gate and the {thing}...