--TEST--
Method -- PHP_Compat::loadConstant -- load an array of constants
--FILE--
<?php
require_once ('PHP/Compat.php');
$comps = array('invalid', 'also-invalid', 'more-invalid', 'E_STRICT');
$res = PHP_Compat::loadConstant($comps);
foreach ($res as $value) {
    echo ($value === false) ? 'false' : 'true', "\n";
}
?>
--EXPECT--
false
false
false
true