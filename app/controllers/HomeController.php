<?php

class HomeController extends Controller {

    public function __construct($controller, $action){
        parent::__construct($controller, $action);

    }

    public function indexAction(){
        $tr = new TrafficOfficerDomain(124567887,[
            'officer_name' => 'jaye',
            'branch' => 3,
            'police_id' => 45698
        ]);
        dnd($tr);
        $this->view->render('home/index');
    }
}