<?php


class BranchOICController extends UserController{
    private $trafficOfficerC;
    private $offenderC;
    private $finesheetC;
    private $reportC;

    public function __construct($controller, $action) {
        parent::__construct($controller,$action);
        $this->view->setLayout('default');
        $this->trafficOfficerC = new TrafficofficerController($controller,$action);
        $this->offenderC = new OffenderController($controller,$action);
        $this->finesheetC = new FinesheetController($controller,$action);
        $this->reportC = new ReportController($controller,$action);


    }

    public function findOfficerAction(){
        if ($_POST){
            $branch = new Branch();
            $officer = new TrafficOfficerDomain($_POST["id_no"]);
            $branchName = '';       //this added because otherwise the branchName is null if wrong ID entered
            if (!$officer->getBranch()==null){
                $branchName = $branch->findById($officer->getBranch())[0]->branch_name;
            }
            $this->view->finesheets = $officer->getFineSheets();
            $this->view->officer = $officer;
            $this->view->branchName = $branchName;
            $this->view->controller = lcfirst($this->_controller);
        }
        $this->view->render('officers/officerDetails');

    }

    public function generateBranchReportAction(){
        $this->reportC->branchreportAction();
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

    public function viewAction($sheet_no){
        $this->finesheetC->viewAction($sheet_no);
    }


}