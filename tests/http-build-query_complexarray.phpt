--TEST--
PHP_Compat http_build_query() -- with complex arrays
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('http_build_query');

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
user[name]=Bob+Smith&user[age]=47&user[sex]=M&user[dob]=5%2F12%2F1956&pastimes[0]=golf&pastimes[1]=opera&pastimes[2]=poker&pastimes[3]=rap&children[bobby][age]=12&children[bobby][sex]=M&children[sally][age]=8&children[sally][sex]=F&flags_0=CEO