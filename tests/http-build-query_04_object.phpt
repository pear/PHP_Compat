--TEST--
PHP_Compat http_build_query() -- with an object
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('http_build_query');

class myClass {
    var $foo;
    var $baz;
 
    function myClass()
    {
        $this->foo = 'bar';
        $this->baz = 'boom';
    }
}

$data = new myClass();

echo http_build_query($data);
?>
--EXPECT--
foo=bar&baz=boom