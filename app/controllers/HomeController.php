<?php

class HomeController extends Controller {

    public function __construct($controller, $action){
        parent::__construct($controller, $action);

    }

    public function indexAction(){
        //dnd(json_encode(['TrafficOfficer']));
        $this->view->render('home/index');
    }
}