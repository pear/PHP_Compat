--TEST--
Method -- PHP_Compat::loadFunction -- load invalid and valid function
--SKIPIF--
<?php if (function_exists('str_split')) { echo 'skip'; } ?>
--FILE--
<?php
require_once ('PHP/Compat.php');

// Singular
$res = PHP_Compat::loadFunction('invalid');
echo ($res === false) ? 'false' : 'true', "\n";

$res = PHP_Compat::loadFunction('str_split');
echo ($res === false) ? 'false' : 'true';

// With an array
$comps = array('invalid', 'also-invalid', 'more-invalid', 'str_split');
$res = PHP_Compat::loadFunction($comps);
foreach ($res as $value) {
    echo ($value === false) ? 'false' : 'true', "\n";
}
?>
--EXPECT--
false
true
false
false
false
true