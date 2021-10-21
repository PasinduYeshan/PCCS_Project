<?php

class PaidFineSheet extends State{
    private static $instance;
    
    private function __construct(){

    }

    public static function getInstance(){
        if (self::$instance == null){
            $instance =  new PaidFineSheet();
        }
        return $instance;
    }

    public function pay($fineSheet){
        return false;
    }

    public function expire($fineSheet){
        return false;
    }
    
    public function close($fineSheet)
    {
        return false;
    }
}