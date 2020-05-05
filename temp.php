<?php
define ("ROOT",dirname(__FILE__));
define("DS", DIRECTORY_SEPARATOR);
require_once(ROOT . DS . 'app' . DS . 'lib' . DS . 'helpers' . DS . 'helpers.php');
$values =[];
$values[] = 45;
$values[] = 48;

dnd($values);


?>