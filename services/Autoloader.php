<?php
namespace services;

class Autoloader
{
    public function loadClass(string $classname)
    {
        $parts = explode("\\", $classname);
        $dir = $parts[0];
        $file = $parts[1];
        $filename = $_SERVER['DOCUMENT_ROOT'] . "/../{$dir}/{$file}.php";
        var_dump($filename);
        if(file_exists($filename)) {
            require $filename;
            return true;
        }else return false;
    }
}
