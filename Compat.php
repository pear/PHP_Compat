<?php
// +----------------------------------------------------------------------+
// | PHP Version 4                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2004 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2 of the PHP license,         |
// | that is bundled with this package in the file LICENSE, and is        |
// | available at through the world-wide-web at                           |
// | http://au.php.net/license/3_0.txt.                                   |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Author: Aidan Lister <aidan@php.net>                                 |
// +----------------------------------------------------------------------+
//
// $id$
//

require_once 'PEAR.php';

/**
* Types of items
*/
define('PHP_COMPAT_FUNCTION',       1);
define('PHP_COMPAT_CONSTANT',       2);
define('PHP_COMPAT_CLASS',          3);

/**
* Errors
*/
define('PHP_COMPAT_ERROR_NOTFOUND',            1);
define('PHP_COMPAT_ERROR_ALREADYLOADED',       2);

/**
* Provides a set of functions replacing missing functionality
*   in older versions of PHP
*
* @version        0.1
* @author         Aidan Lister <aidan@php.net>
*/
class PHP_Compat
{

    /**
    * Load a component
    *
    * @param string $component The component to load
    * @param constant $type The type of item to load
    * @return void
    */
    function load ($component, $type = PHP_COMPAT_FUNCTION)
    {
        // What are we trying to load
        if ($type == PHP_COMPAT_FUNCTION)
        {
            // Check if the function exists
            if (!function_exists($component))
            {
                $file = 'PHP/Compat/Function/' . $component. '.php';

                // Check if the file exists
                if ($this->file_exists_incpath($file)) {
                    require_once $file; }
                
                else {
                    // The file doesn't exist
                    return $this->raiseError(PHP_COMPAT_ERROR_NOTFOUND); }
            }
            
            else {
                // The function already exists
                return $this->raiseError(PHP_COMPAT_ERROR_ALREADYLOADED); }
        }
    }


	/**
	* Check if a file exists in the include path
	*
	* @param string $file The name of the file to look for
	* @return bool True if the file exists, False if it does not
	*/
	function file_exists_incpath ($file)
	{
		// Loop through each path in the include path
		$paths = explode(PATH_SEPARATOR, get_include_path());
		foreach ($paths as $path)
		{
			// Formulate the absolute path
			$fullpath = $path . '/' . $file;

			// Check it
			if (file_exists($fullpath)) {
				return true; }
		}

		// If we didn't find it, return false
		return false;
	}


    /**
    * Return a PEAR_Error object
    *
    * @param constant $type The error code
    * @return object PEAR_Error
    */
    function raiseError ($errno)
    {
        $messages = array(
                    PHP_COMPAT_ERROR_NOTFOUND       => 'Component not found',
                    PHP_COMPAT_ERROR_ALREADYLOADED  => 'Component already loaded');

        $message = sprintf("PHP_Compat Error: %s", $messages[$errno]);

        return PEAR::raiseError($message, $errno);

    }

}

?>