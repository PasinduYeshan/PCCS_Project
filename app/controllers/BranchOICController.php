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
            $trafficOfficerModel = new TrafficOfficer();
            if (!empty(trim($_POST['id_no'])) && empty(trim($_POST['officer_id_no']))){
                $officerM = $trafficOfficerModel->findById(trim($_POST['id_no']));
            }
            elseif (!empty(trim($_POST['id_no'])) && !empty(trim($_POST['officer_id_no']))){
                $officerM = $trafficOfficerModel->findById(trim($_POST['id_no']));
            }
            elseif (empty(trim($_POST['id_no'])) && !empty(trim($_POST['officer_id_no']))){
                $officerM = $trafficOfficerModel->findByOfficerId(trim($_POST['officer_id_no']));
            }else{
                $officerM = null;
            }
            if($officerM != null){
                $id_number = $officerM[0]->id_no;
                $branch = new Branch();
                $officer = new TrafficOfficerDomain($id_number);
                $branchName = '';       //this added because otherwise the branchName is null if wrong ID entered
                if (!$officer->getBranch()==null){
                    $branchName = $branch->findById($officer->getBranch())[0]->branch_name;
                }
                $this->view->finesheets = $officer->getFineSheets();
                $this->view->branchName = $branchName;
            }else{
                $officer = null;
                $this->view->finesheets = null;
                $this->view->branchName = null;

            }
            
            
            $this->view->officer = $officer;
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