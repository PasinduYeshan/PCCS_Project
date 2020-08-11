<?php

define('DS',DIRECTORY_SEPARATOR);
define('ROOT',dirname(__FILE__));

// load configration and helper functions

require_once(ROOT . DS . 'config' . DS . 'config.php');
require_once(ROOT . DS . 'app' . DS . 'lib' . DS . 'helpers' . DS . 'functions.php');

//Autoload classes

function autoload($className) {
    if(file_exists(ROOT . DS . 'core' . DS . $className . '.php')) {
        require_once(ROOT . DS . 'core' . DS . $className . '.php');
    }elseif(file_exists(ROOT . DS . 'app' .DS . 'controllers' . DS . $className . '.php')) {
        require_once(ROOT . DS . 'app' . DS . 'controllers' . DS . $className . '.php');
    }elseif(file_exists(ROOT . DS . 'app' .DS . 'models' . DS . $className . '.php')) {
        require_once(ROOT . DS . 'app' . DS . 'models' . DS . $className . '.php');
    }elseif(file_exists(ROOT . DS . 'app' .DS . 'BusinessDomain'. DS . 'finesheet'. DS . $className . '.php')) {
        require_once(ROOT . DS . 'app' .DS . 'BusinessDomain'. DS . 'finesheet'. DS . $className . '.php');
    }elseif(file_exists(ROOT . DS . 'app' .DS . 'BusinessDomain'. DS .$className . '.php')) {
        require_once(ROOT . DS . 'app' .DS . 'BusinessDomain'. DS . $className . '.php');
    }
}

spl_autoload_register('autoload');
session_start();





?>