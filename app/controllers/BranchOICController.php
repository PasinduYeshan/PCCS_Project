<?php


class BranchOICController extends UserController{
    private $trafficOfficerC;
    private $offenderC;

    public function __construct($controller, $action) {
        parent::__construct($controller,$action);
        $this->view->setLayout('default');
        $this->trafficOfficerC = new TrafficofficerController($controller,$action);
        $this->offenderC = new OffenderController($controller,$action);

    }

    public function findOfficerAction(){
        $this->trafficOfficerC->findOfficerAction();
    }

    public function generateBranchReport(){
        //Add relevant items
    }

    public function findOffenderAction(){
        
    }


}