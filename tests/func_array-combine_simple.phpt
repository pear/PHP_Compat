--TEST--
PHP_Compat array_combine() -- simple usage
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('array_combine');

$a = array('green', 'red', 'yellow');
$b = array('avocado', 'apple', 'banana');
$c = array_combine($a, $b);

print_r($c);
?>
--EXPECT--
Array
(
    [green] => avocado
    [red] => apple
    [yellow] => banana
)