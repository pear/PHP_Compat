--TEST--
Environment - register_argc_argv off
--INI--
register_argc_argv=On
--ARGS--
-d register_argc_argv=On --foo
--FILE--
<?php
require_once 'PHP/Compat/Environment/register_argc_argv_off.php';
var_dump(isset($GLOBALS['argc'], $GLOBALS['argv']));
?>
--EXPECT--
bool(false)