--TEST--
Function -- http_build_query -- simple usage
--SKIPIF--
<?php if (function_exists('http_build_query')) { echo 'skip'; } ?>
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('http_build_query');

$data = array('foo'=>'bar',
             'baz'=>'boom',
             'cow'=>'milk',
             'php'=>'hypertext processor');
            
echo http_build_query($data);
?>
--EXPECT--
foo=bar&baz=boom&cow=milk&php=hypertext+processor