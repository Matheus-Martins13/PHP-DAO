<?php

session_start();

spl_autoload_register(function($class_name){
    $dirClass = "class";
    $filename = $dirClass.DIRECTORY_SEPARATOR . $class_name . ".php";

    if (file_exists($filename)){
        require_once($filename);
    }
});

setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "portuguese.utf-8");

?>