<?php


class TrafficofficerController extends UserController{
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

    public function fineamountAction(){
        $this->finesheetC->fineamountAction();
    }

    // public function findOfficerAction(){
    //     if ($_POST){
    //         $officer = $this->TrafficOfficerModel->findById($_POST['id_no']);
    //         $this->view->officer = $officer;
    //         $this->view->controller = lcfirst($this->_controller);
    //     }
    //     $this->view->render('offender/offenderDetails');
    // }


}