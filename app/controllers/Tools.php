<?php

class Tools extends Controller{

    public function __construct($controller,$action)
    {
        parent::__construct($controller,$action);
    }

    public function indexAction(){
        $this -> view->render('tools/index');
    }

    public function firstAction(){
        $this -> view->render('tools/first');
    }

    public function secondAction(){
        $this -> view->render('tools/second');
    }
    

}