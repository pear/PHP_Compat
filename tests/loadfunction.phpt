--TEST--
Method -- PHP_Compat::loadFunction
--SKIPIF--
<?php if (function_exists('str_split') || function_exists('scandir')) { echo 'skip'; } ?>
--FILE--
<?php
require_once ('PHP/Compat.php');

// Singular
$test1 = array ();
$test1[] = PHP_Compat::loadFunction('invalid');
$test1[] = PHP_Compat::loadFunction('str_split');

// With an array
$components = array('invalid', 'also-invalid', 'more-invalid', 'scandir');
$test2 = PHP_Compat::loadFunction($components);

$results = array_merge($test1, $test2);
foreach ($results as $result) {
	echo ($result === true) ? 'true' : 'false', "\n";
}
?>
--EXPECT--
false
true
false
false
false
true