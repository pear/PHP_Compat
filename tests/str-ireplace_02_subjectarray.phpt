--TEST--
PHP_Compat str_ireplace() -- With the subject as an array
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('str_ireplace');

// As a full array
$search = '{SUBJECT}';
$replace = 'Lady';
$subject = array('A {subject}', 'The {subject}', 'My {subject}');
print_r(str_ireplace($search, $replace, $subject));

// As a single array
$search = '{SUBJECT}';
$replace = 'Lady';
$subject = array('The dog jumped over the {object}');
print_r(str_ireplace($search, $replace, $subject));
?>
--EXPECT--
Array
(
    [0] => A Lady
    [1] => The Lady
    [2] => My Lady
)
Array
(
    [0] => The dog jumped over the {object}
)