<?php

class PaidFineSheet extends State{
    private static $instance;
    
    private function __construct(){

    }

    public static function getInstance(){
        if (self::$instance == null){
            return new PaidFineSheet();
        }
        return new PaidFineSheet();
    }

    public function pay($fineSheet){
        return false;
    }

    public function expire($fineSheet){
        return false;
    }
}