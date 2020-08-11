<?php

class ClosedFineSheet extends State{
    private static $instance;
    
    private function __construct(){

    }

    //Check a way to make this synchronized
    public static function getInstance(){ //Singleton
        if (self::$instance == null){
            $instance = new ClosedFineSheet();
        }
        return $instance;
    }

    public function pay($fineSheet){
        return false;
    }

    public function expire($fineSheet){
        return false;
    }

    public function close($fineSheet){
        return false;
    }
}