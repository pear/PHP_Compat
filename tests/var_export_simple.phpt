--TEST--
Function -- var_export -- simple
--SKIPIF--
<?php if (function_exists('var_export')) { echo 'skip'; } ?>
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('var_export');

$a = array (1, 2, array ("a", "b", "c"));
var_export($a);
echo "\n";
echo var_export($a, true);
?>
--EXPECT--
array (
  0 => 1,
  1 => 2,
  2 => 
  array (
    0 => 'a',
    1 => 'b',
    2 => 'c',
  ),
)
array (
  0 => 1,
  1 => 2,
  2 => 
  array (
    0 => 'a',
    1 => 'b',
    2 => 'c',
  ),
)