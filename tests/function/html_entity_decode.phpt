--TEST--
Function -- html_entity_decode
--SKIPIF--
<?php if (function_exists('html_entity_decode')) { echo 'skip'; } ?>
--FILE--
<?php
require_once 'PHP/Compat.php';
PHP_Compat::loadFunction('html_entity_decode');

$values = array (2, 'car');

$string = "I'll &quot;walk&quot; the &lt;b&gt;dog&lt;/b&gt; now";
echo html_entity_decode($string);
?>
--EXPECT--
I'll "walk" the <b>dog</b> now