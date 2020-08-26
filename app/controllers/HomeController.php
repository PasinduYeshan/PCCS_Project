<?php

class HomeController extends Controller {
    

    public function __construct($controller, $action){
        parent::__construct($controller, $action);

    }

    public function indexAction(){
       


        // //This is how we can get the aray for the branch report
        // $branch_id = 1;
        // $branchReport = new BranchReport("2020-08-01","2020-08-15");
        // $branch = new BranchDomain($branch_id); //BranchGroup
        // $branch->accept($branchReport);
         //$reportArray = $branchReport->getReportArray();
        
        //This is how we can get the aray for the overall report
        /*
        //$branchReport = new OverallReport("2020-08-01","2020-08-15");
        //$branchGroup = new BranchGroup(); //BranchGroup
        //$branchGroup->accept($branchReport);
        //$reportArray = $branchReport->getReportArray();
        */
        //$HigherOfficer=new HigherOfficerController($this->_controller,$this->_action);
        //$HigherOfficer->generateOverallReportAction();
        $this->view->render('home/index');

    }
}
