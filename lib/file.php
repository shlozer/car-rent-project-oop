<?php
class File {
    public static function build_path($path_array = null) {
        $DS = DIRECTORY_SEPARATOR ;
        $ROOT_FOLDER = __DIR__ . $DS . "..";
        //$ROOT_FOLDER = "C:/EasyPHP-Devserver-17/eds-www/php_poo/UnivMontpellier";
        //echo $ROOT_FOLDER. '/' . join('/', $path_array);
        return $ROOT_FOLDER. '/' . join('/', $path_array);
    }
}