--TEST--
PHP_Compat http_build_query() -- simple usage
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