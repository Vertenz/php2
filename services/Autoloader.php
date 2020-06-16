<?php
namespace app\services;

class Autoloader
{
    private $fileExrension = ".php";

    public function loadClass(string $classname)
    {
        $parts = explode("\\", $classname);
        $dir = $parts[1];
        $file = $parts[2];
        $filename = $_SERVER['DOCUMENT_ROOT'] . "/../{$dir}/{$file}.php";
        if(file_exists($filename)) {
            require $filename;
            return true;
        }else return false;
    }

//    public function loadClass(string $classname)
//    {
//        $classname = str_replace('app\\', PATH_ROOT, $classname);
//        $filename = realpath("{$classname}{$this->fileExrension}");
//        var_dump($filename);
//        if (file_exists($filename)) {
//            require $filename;
//            return true;
//        }
//
//        return false;
//    }
}
