<?php

class OverDueFineSheet extends State{
    private static $instance;
    
    private function __construct(){

    }

    public static function getInstance(){
        if (self::$instance == null){
            $instance = new OverDueFineSheet();
        }
        return $instance;
    }

    public function pay($fineSheet){
        $fineSheet->setState(PaidFineSheet::getInstance(),1);
    }

    public function expire($fineSheet){
        return false;
    }

    public function close($fineSheet){
        $fineSheet->setState(ClosedFineSheet::getInstance(),3);
    }
}