<?php


class TrafficofficerController extends Controller{
    private $finesheetC;

    public function __construct($controller, $action) {
        parent::__construct($controller,$action);
        $this->view->setLayout('default');
        $this->finesheetC = new FinesheetController($controller,$action);


    }


    public function addAction(){
        $this->finesheetC->addAction();

    }

    public function detailsAction() {
        $this->finesheetC->detailsAction();
    }

    public function viewAction($sheet_no){
        $this->finesheetC->viewAction($sheet_no);
    }





}