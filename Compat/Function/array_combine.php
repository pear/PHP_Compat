<?php
/**
 * Replace array_combine()
 * PHP 5
 * 
 * http://php.net/function.array_combine
 *
 * @author        Ross Smith <pearspam@netebb.com>
 * @author        Aidan Lister <aidan@virtualexplorer.com.au>
 * @version       1.0
 */
if (!function_exists('array_combine'))
{
    function array_combine($keys, $values)
    {
        if (count($keys) !== count($values) ||
            count($keys) === 0 ||
            count($values) === 0) {

            return false;
        }

        $keys    = array_values($keys);
        $values  = array_values($values);

        $rv = array ();

        for ($i = 0, $cnt = count($values); $i < $cnt; $i++) {
            $rv[$keys[$i]] = $values[$i];
        }

        return $rv;
    }
}

?>