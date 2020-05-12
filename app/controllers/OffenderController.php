<?php


class OffenderController extends UserController{
    private $finesheetC;
    private $licenceC;

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('default');
        $this->finesheetC = new FinesheetController($controller,$action);
        $this->licenceC = new LicenceController($controller,$action);
    }


    public function myfinesAction(){
        $this->finesheetC->myfinesAction();
    }

    public function viewAction($sheet_no){
        $this->finesheetC->viewAction($sheet_no);
    }

    public function mylicenceAction(){
        $this->licenceC->mylicenceAction();
    }

}