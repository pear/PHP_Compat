--TEST--
PHP_Compat is_a() -- simple
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('is_a');

class WidgetFactory
{
    var $oink = 'moo';
}

$wf = new WidgetFactory();

if (is_a($wf, 'WidgetFactory')) {
    echo 'true';
}
?>
--EXPECT--
true