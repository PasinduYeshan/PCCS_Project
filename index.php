<?php
    
    define ("ROOT",dirname(__FILE__));
    define("DS", DIRECTORY_SEPARATOR);

    require_once(ROOT . DS . 'config' . DS  . 'config.php');
    (ROOT . DS . 'app' . DS . 'lib' . DS . 'helpers' . DS . 'functions.php');
    require_once(ROOT . DS . 'app' . DS . 'lib' . DS . 'helpers' . DS . 'helpers.php');

    //Auload the classes
    function autoload($className){
        if (file_exists(ROOT . DS . 'app' .DS. 'controllers' . DS .  $className.'.php')){
            require_once(ROOT . DS. 'app' .DS . 'controllers' . DS . $className.'.php');
        }elseif (file_exists(ROOT . DS . 'app' . 'models' . DS . $className . '.php')){
            require_once(ROOT . DS . 'app' . 'models' . DS . $className . '.php');
        }elseif (file_exists(ROOT . DS . 'core' . DS . $className . '.php')){
            require_once(ROOT . DS . 'core' . DS . $className . '.php');
        }
    }

    spl_autoload_register('autoload'); //Newer funciton should be before session_start();

    session_start();
    /*Here $_SERVER['PATH_INFO'] is invalid due to some problem find solution*/
    /*
    echo $_SERVER['SCRIPT_NAME'];
    echo ($_SERVER['PHP_SELF']);
    echo ($_SERVER['REQUEST_URI']);
    echo nl2br(" \n "); //Line break
    */
    /*Since PATH_INFO is not working I use REQUEST_URI and ignore the project name at array[0] element*/
    $url = isset($_SERVER['REQUEST_URI']) ? explode('/', ltrim($_SERVER['REQUEST_URI'],'/')) : [];
    $url = array_slice($url,1); //Slice the array 

    // Route the request 
    Router::route($url);
    

?>