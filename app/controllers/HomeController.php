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
        // //dnd(($report->getFinesheets()));
        
        $this->view->render('home/index');
    }
}