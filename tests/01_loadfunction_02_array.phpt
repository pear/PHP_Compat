--TEST--
PHP_Compat::loadFunction() -- load an array of functions
--FILE--
<?php
require_once ('PHP/Compat.php');
$comps = array('invalid', 'also-invalid', 'more-invalid', 'str_split');
$res = PHP_Compat::loadFunction($comps);
foreach ($res as $value) {
    echo ($value === false) ? 'false' : 'true', "\n";
}
?>
--EXPECT--
false
false
false
true