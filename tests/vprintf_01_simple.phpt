--TEST--
PHP_Compat vprintf() -- simple
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('vprintf');

vprintf('The %s went to the %s and drank %d beers', array('dog', 'liquer store', '6a'));
?>
--EXPECT--
The dog went to the liquer store and drank 6 beers