<?php
/**
* Replace is_a()
* http://php.net/function.is_a
*
* This function was originally contributed by a user in the php.net manual
*
* @author        Aidan Lister <aidan@php.net>
* @version       1.0
*/
if (!function_exists('is_a'))
{
    function is_a ($object, $class)
    {
        if (get_class($object) == strtolower($class)) {
            return true; }

        else {
            return is_subclass_of($object, $class); }
    }
}

?>