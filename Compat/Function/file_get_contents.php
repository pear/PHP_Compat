<?php
/**
 * Replace file_get_contents()
 * PHP 5
 *
 * http://php.net/function.file_get_contents
 *
 * @author        Aidan Lister <aidan@php.net>
 * @version       1.0
 */
if (!function_exists('file_get_contents'))
{
    function file_get_contents ($filename, $incpath = false)
    {
        $file = fopen($filename, 'rb', $incpath);

        if ($file) {
            if ($fsize = filesize($filename)) {
                $data = fread($file, $fsize);
			}
			
			else {
                while (!feof($file)) {
                    $data .= fread($file, 8192);
				}
            }

            fclose($file);
        }

        return $data;
    }
}

?>