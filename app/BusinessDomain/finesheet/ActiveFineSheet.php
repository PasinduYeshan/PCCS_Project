<?php

class ActiveFineSheet extends State{
    private static $instance;
    
    private function __construct(){

    }

    //Check a way to make this synchronized
    public static function getInstance(){ //Singleton
        if (self::$instance == null){
            $instance = new ActiveFineSheet();
        }
        return $instance;
    }

    public function pay($fineSheet){
        $fineSheet->setState(PaidFineSheet::getInstance(),1);
    }

    public function expire($fineSheet){
        $fineSheet->setState(OverDueFineSheet::getInstance(),2);
    }

    public function close($fineSheet){
        return false;
    }
}