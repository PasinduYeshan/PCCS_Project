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
        if ($_POST){
            $officer = new TrafficOfficerDomain($_POST);
            $this->view->finesheets = $officer->getFineSheets();
            $this->view->officer = $officer;
            $this->view->controller = lcfirst($this->_controller);
        }
    }

    public function generateBranchReportAction(){
        //Add relevant items
    }

    public function findOffenderAction(){
        if ($_POST){
            $offender = new OffenderDomain($_POST["id_no"]);
            $this->view->finesheets = $offender->getMyFineSheets();
            $this->view->offender = $offender;
            $this->view->controller = lcfirst($this->_controller);
        }
        $this->view->render('offender/offenderDetails');
        
    }


}