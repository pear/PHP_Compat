<?php
// Get array of functions on filesystem
$filesystem = scandir('Compat/Function/');
unset($filesystem[0]); // .
unset($filesystem[1]); // ..
unset($filesystem[2]); // CVS
sort($filesystem);

// Get a list of files from the package2.xml
$xml = simplexml_load_file('package2.xml');
$xml->registerXPathNamespace('pear', 'http://pear.php.net/dtd/package-2.0');
$xpath = '/pear:package/pear:contents/pear:dir[@name="/"]/pear:dir[@name="Compat"]/pear:dir[@name="Function"]/pear:file';
$filexml = array();
foreach ($xml->xpath($xpath) as $file) {
    $filexml[] = (string) $file['name'];
}
sort($filexml);

// Get list of files from Components.php
require 'Compat/Components.php';
$filecomps = array_keys($components['function']);
foreach ($filecomps as $k => $comp) { $filecomps[$k] = $comp . '.php'; }
sort($filecomps);

// Diff them
$error = false;
$res = array_diff($filesystem, $filexml);
if (!empty($res)) {
    echo "Exists in filesystem but not in XML:\n";
    print_r($res);
    $error = true;
}

$res = array_diff($filesystem, $filecomps);
if (!empty($res)) {
   echo "Exists in filesystem but not in Components:\n";
   print_r($res);
   $error = true;
}

$res = array_diff($filexml, $filesystem);
if (!empty($res)) {
    echo "Exists in XML but not in Filesytem:\n";
    print_r($res);
    $error = true;
}

if ($error === false) {
    echo "No errors found\n";
}

?>
