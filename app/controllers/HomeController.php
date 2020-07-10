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
        if (Session::exists(CURRENT_USER_SESSION_NAME)){
            $current_user_acls[] = "LoggedIn";
            foreach (currentUser()->acls() as $a){
                $current_user_acls[] = $a;
            }
            
        }
        else{
            $current_user_acls[] = "Guest";
        }
        foreach ($current_user_acls as $a){
            if ($a = "TrafficOfficer"){
                $this->view->render('home/index');
            }
        }
        
        
        $this->view->render('home/index');
    }
}