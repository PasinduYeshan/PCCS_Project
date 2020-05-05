<?php

class Application{
    public function __construct(){
        $this-> _set_reporting();
        $this-> _unregister_globals();
    }

    private function _set_reporting(){
        if(DEBUG){ //Only when DEBUG true in config it will show errors on page
            error_reporting(E_ALL);
            ini_set('display_errors',1); //Change the sysetm values
        }else{
            error_reporting(0);
            ini_set('display_errors',0);
            ini_set('log_error',1); //Else errors will be on below link error.log
            ini_set('error_log', ROOT . DS . 'tmp' . DS . 'logs' . DS . 'errors.log');
        }
    }
    /*This function will reduce replacing our variables by the PUBLIC variables 
    still _SESSION , _COOKIES like global variables will work.
    */
    private function _unregister_globals(){
        if(ini_get('register_global')){
            $globalsAry = ['_SESSION','_COOKIE','_POST','_GET','_REQUEST','_SERVER','_ENV','_FILES']; 
            foreach($globalsAry as $g){
                foreach($GLOBALS[$g] as $k => $v){ //???? why
                    if ($GLOBALS[$k] === $v){
                        unset($GLOBALS[$k]);
                    }
                }
            }
        }
    }
    
        

}