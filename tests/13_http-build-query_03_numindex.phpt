--TEST--
PHP_Compat http_build_query() -- with numerically indexed elements
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('http_build_query');

$data = array('foo', 'bar', 'baz', 'boom', 'cow' => 'milk', 'php' =>'hypertext processor');   
echo http_build_query($data);
echo "\n";
echo http_build_query($data, 'myvar_');
echo "\n";
?>
--EXPECT--
0=foo&1=bar&2=baz&3=boom&cow=milk&php=hypertext+processor
myvar_0=foo&myvar_1=bar&myvar_2=baz&myvar_3=boom&cow=milk&php=hypertext+processor