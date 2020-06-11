<?php

class NewFineSheet extends State{
    private static $instance;
    
    private function __construct(){

    }

    //Check a way to make this synchronized
    public static function getInstance(){ //Singleton
        if (self::$instance == null){
            return new NewFineSheet();
        }
        return new NewFineSheet();
    }

    public function pay($fineSheet){
        $fineSheet->setState(PaidFineSheet::getInstance());
    }

    public function expire($fineSheet){
        $fineSheet->setState(OverDueFineSheet::getInstance());
    }
}