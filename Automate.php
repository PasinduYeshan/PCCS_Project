<?php

function check(){
    $myfile = fopen("newfile.txt", "a");
    $txt = "John Doe\n";
    fwrite($myfile, $txt);
    $txt = "Jane Doe\n";
    fwrite($myfile, $txt);
    fclose($myfile);
}


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
    }elseif(file_exists(ROOT . DS . 'app' .DS . 'BusinessDomain'. DS . 'report'. DS . $className . '.php')) {
        require_once(ROOT . DS . 'app' .DS . 'BusinessDomain'. DS . 'report'. DS . $className . '.php');
    }elseif(file_exists(ROOT . DS . 'app' .DS . 'BusinessDomain'. DS .$className . '.php')) {
        require_once(ROOT . DS . 'app' .DS . 'BusinessDomain'. DS . $className . '.php');
    }
}

spl_autoload_register('autoload');
session_start();

$FinesheetModel = new Finesheet();

/**------------------Send emails to OICs------------------------- */
$startDate = date("Y-m-d", strtotime("-3 days"));
$endDate = date("Y-m-d", strtotime("-1 days"));
$finesheets =  $FinesheetModel->findFineSheetToMail($startDate,$endDate);
foreach ($finesheets as $sheet_no){
    $fineSheet = new FineSheetDomain($sheet_no);
    $fineSheet->expire();
}

/**------------------Send Warnings------------------------- */
$warningDate = date("Y-m-d", strtotime("-3 days"));
$warnings =  $FinesheetModel->findWarnings($warningDate);
foreach ($finesheets as $sheet_no){
    $fineSheet = new FineSheetDomain($sheet_no);
    $fineSheet->sendWarnings();
}


