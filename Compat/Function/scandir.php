<?php
/**
* Replace scandir()
* http://php.net/function.scandir
*
* This function was originally contributed by a user in the php.net manual
*
* @author        Aidan Lister <aidan@php.net>
* @version       1.0
*/
if (!function_exists('scandir'))
{
    function scandir($directory)
    {
        if (!is_dir($directory)) {
            return false; }

        $files = array ();

        $fh = opendir($directory);
        while (false !== ($filename = readdir($fh)))
            $files[] = $filename;

        closedir($fh);
        sort($files);

        return $files;
    }
}

?>