<?php

class Router{
    public static function route($url){
        
        //controller
        //ucwords convert the first letter to Capital
        //If no controller is set make DEFAULT_CONTROLLER
        $controller = (isset($url[0]) && $url[0] != '') ? ucwords($url[0]) : DEFAULT_CONTROLLER; 
        $controller_name = $controller;
        array_shift($url); //Remove the first element of the array and give it out

        //actions
        $action = (isset($url[0]) && $url[0] != '') ? $url[0] . 'Action' : 'indexAction';
        $action_name = $action; 
        array_shift($url);

        //params
        $queryParams = $url;
        $dispatch = new $controller($controller_name,$action); //Create new class by Controller name
        
        /* Below is similar to
        $dispatch->registerAction($queryParams);  registerAction = $action
        */
        if(method_exists($controller, $action)){
            call_user_func_array([$dispatch,$action], $queryParams); //$dispatch - object
        }else{
            die('This method doesn\'t exist in the controller \"'. $controller_name . '\"');
        }

    }
}