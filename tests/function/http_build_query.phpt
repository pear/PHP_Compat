--TEST--
Function -- http_build_query
--SKIPIF--
<?php if (function_exists('http_build_query')) { echo 'skip'; } ?>
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('http_build_query');

// Simple
$data = array('foo'=>'bar',
             'baz'=>'boom',
             'cow'=>'milk',
             'php'=>'hypertext processor');
            
echo http_build_query($data), "\n";


// With an object
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
echo http_build_query($data), "\n";


// With numerically indexed elements
$data = array('foo', 'bar', 'baz', 'boom', 'cow' => 'milk', 'php' =>'hypertext processor');   
echo http_build_query($data), "\n";
echo http_build_query($data, 'myvar_'), "\n";


// With a complex array
$data = array('user'=>array('name'=>'Bob Smith',
                           'age'=>47,
                           'sex'=>'M',
                           'dob'=>'5/12/1956'),
             'pastimes'=>array('golf', 'opera', 'poker', 'rap'),
             'children'=>array('bobby'=>array('age'=>12,
                                               'sex'=>'M'),
                               'sally'=>array('age'=>8,
                                               'sex'=>'F')),
             'CEO');
                                              
echo http_build_query($data, 'flags_');
?>
--EXPECT--
foo=bar&baz=boom&cow=milk&php=hypertext+processor
foo=bar&baz=boom
0=foo&1=bar&2=baz&3=boom&cow=milk&php=hypertext+processor
myvar_0=foo&myvar_1=bar&myvar_2=baz&myvar_3=boom&cow=milk&php=hypertext+processor
user[name]=Bob+Smith&user[age]=47&user[sex]=M&user[dob]=5%2F12%2F1956&pastimes[0]=golf&pastimes[1]=opera&pastimes[2]=poker&pastimes[3]=rap&children[bobby][age]=12&children[bobby][sex]=M&children[sally][age]=8&children[sally][sex]=F&flags_0=CEO