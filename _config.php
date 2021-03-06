<?php
/*** configuration *****/
ini_set('display_errors','on');
error_reporting(E_ALL);
session_start();

class MyAutoload
{
    public static function start()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
        
        $root = $_SERVER['DOCUMENT_ROOT'];
        $host = $_SERVER['HTTP_HOST'];
// 		echo "<pre>"; var_dump($_SERVER); exit;
        define('HOST', $_SERVER['REQUEST_SCHEME'].'://'.$host.DIRECTORY_SEPARATOR.basename(__DIR__).DIRECTORY_SEPARATOR);
        define('ROOT', $root.basename(__DIR__).DIRECTORY_SEPARATOR);

        define('CONTROLLER', ROOT.'controller/');
        define('VIEW', ROOT.'view/');
        define('MODEL', ROOT.'model/');
        define('CLASSES', ROOT.'classes/');
        define('UPOLOADS', ROOT.'assets/img/uploads/');
        
        define('ASSETS', HOST.'assets/');
        define('UPOLOAD_URL', HOST.'assets/img/uploads/');
    }

    public static function autoload($class)
    {
        if(file_exists(MODEL.$class.'.php'))
        {
            include_once (MODEL.$class.'.php');
        } else if (file_exists(CLASSES.$class.'.php'))
        {
            include_once (CLASSES.$class.'.php');
        } else if (file_exists(CONTROLLER.$class.'.php'))
        {
            include_once (CONTROLLER.$class.'.php');
        } ;

    }
}




