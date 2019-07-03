<?php

namespace libs;

class AutoLoader
{
    public function AutoLoad($className)
    {
        $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $className);
        require_once (MAIN_PATH . DIRECTORY_SEPARATOR . $classPath . '.php');
    }
}

