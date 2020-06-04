<?php

class OverDueFineSheet extends State{
    private static $instance;
    
    private function __construct(){

    }

    public static function getInstance(){
        if (self::$instance == null){
            return new OverDueFineSheet();
        }
        return new OverDueFineSheet();
    }

    public function pay($fineSheet){
        $fineSheet->setState(PaidFineSheet::getInstance());
    }

    public function expire($fineSheet){
        return false;
    }
}