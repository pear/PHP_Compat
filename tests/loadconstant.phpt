--TEST--
Method -- PHP_Compat::loadConstant -- load invalid and valid constants
--SKIPIF--
<?php if (defined('E_STRICT')) { echo 'skip'; } ?>
--FILE--
<?php
require_once ('PHP/Compat.php');

// Singular
$res = PHP_Compat::loadConstant('invalid');
echo ($res === false) ? 'false' : 'true', "\n";

$res = PHP_Compat::loadConstant('E_STRICT');
echo ($res === false) ? 'false' : 'true';

// With an array
$comps = array('invalid', 'also-invalid', 'more-invalid', 'E_STRICT');
$res = PHP_Compat::loadConstant($comps);
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