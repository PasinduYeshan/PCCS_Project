<?php

class View{
    protected $_head , $_body, $_siteTitle = SITE_TITLE, $_outputBuffer,$_layout = DEFAULT_LAYOUT;
    
    public function __construct()
    {
        
    }

    public function render($viewName){
        $viewAry = explode('/',$viewName); //Just make sure '/' '\' or doessnt matter as DS is for them
        $viewString = implode(DS,$viewAry);
        if (file_exists(ROOT.DS.'app'.DS.'views'.DS.$viewString.'.php')){ //Look for relevant view
           include(ROOT.DS.'app'.DS.'views'.DS.$viewString.'.php');
           include(ROOT.DS.'app'.DS.'views'.DS.'layouts'.DS.$this->_layout.'.php'); //Including the layout
        }else{
            die('The view \"'. $viewName.'\" does not exist.');
        }
    }

    public function content($type){ //Return the content
        if ($type == 'head'){
            return $this->_head;
        }elseif($type == 'body'){
            return $this -> _body;
        }
        return false;
    }

    /*ob_start(); turn on the output buffering
    it takes everything needed to be outputted to the screen and stores it as STRINGS*/
    public function start($type){
        $this ->_outputBuffer = $type;
        ob_start();
    }

    public function end(){
        if($this -> _outputBuffer == 'head'){
            $this-> _head = ob_get_clean(); // Get current buffer contents and delete current output buffer
        }elseif($this -> _outputBuffer == 'body'){
            $this-> _body = ob_get_clean();
        }else{
            die('You must first run the start method');
        }
    }

    public function siteTitle(){ //Getter for site title 
        return $this->_siteTitle;
    }

    /*---------------------Setters---------------*/
    public function setSiteTitle($title){
        $this ->_siteTitle = $title;
    }

    public function setLayout($path){
        $this ->_layout = $path;
    }

    /*---------------------------------------------*/
}