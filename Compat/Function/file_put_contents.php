<?php
/**
 * Replace file_put_contents()
 * PHP 5
 *
 * http://php.net/function.file_put_contents
 *
 * @author        Aidan Lister <aidan@php.net>
 * @version       1.0
 */
if (!function_exists('file_put_contents'))
{
    function file_put_contents ($filename, $content)
    {
        $bytes = 0;

        if (($file = fopen($filename, 'w+')) === false) {
            return false;
		}

        if (($bytes = fwrite($file, $content) === false) {
            return false;
		}

        fclose($file);

        return $bytes;
    }
}

?>