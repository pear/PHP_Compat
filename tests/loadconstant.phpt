--TEST--
Method -- PHP_Compat::loadConstant
--SKIPIF--
<?php if (defined('E_STRICT')) { echo 'skip'; } ?>
--FILE--
<?php
require_once ('PHP/Compat.php');

// Singular
$test1 = array ();
$test1[] = PHP_Compat::loadConstant('invalid');
$test1[] = PHP_Compat::loadConstant('E_STRICT');

// With an array
$components = array('invalid', 'also-invalid', 'more-invalid', 'E_STRICT');
$test2 = PHP_Compat::loadConstant($components);

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