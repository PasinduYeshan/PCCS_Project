<?php

class HomeController extends Controller {

    public function __construct($controller, $action){
        parent::__construct($controller, $action);

    }

    public function indexAction(){
        // $report = new OverallReport();
        // $branchG = new BranchGroup();
        // $branchG->accept($report);
        // //dnd($report->getTrafficOfficers());
        // // //dnd(($report->getFinesheets()));
        // $offender = new OffenderDomain("1111");
<<<<<<< HEAD
        // $fine = $offender->getMyFineSheets();
        // dnd($offender);
        $branch = new BranchDomain(1);
        $branchReport = new BranchReport();
        $branch->accept($branchReport);
        $branchReport->getFinesheets();
=======
        //$a = new TrafficOfficerDomain("810747419V");
        //dnd($a->getPoliceId());
>>>>>>> 5df3340b5880f75cfeababde8051a658d9af8aa7
        $this->view->render('home/index');
    }
}