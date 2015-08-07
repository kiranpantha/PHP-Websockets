<?php
/**
 * Contains core autoloading system
 */

namespace Phpws\Core;

/**
 * Autoload class
 *
 * On systems where the file name is case sensitive, 
 */
class Autoload
{
    static public function load($class)
    {
        $classParts = explode('\\', $class);
        $rootNamespace = array_shift($classParts);
        if (strtolower($rootNamespace) == 'phpws')
        {
            foreach ($classParts as &$part)
            {
                $part = strtolower($part);
            }
        
            $path = implode('/', $classParts) . '.php'
            include_once($path);
        }
    }
}

spl_autoload_register(__NAMESPACE__ . '\\Autoload::load');