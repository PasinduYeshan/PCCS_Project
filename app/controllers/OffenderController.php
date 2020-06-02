<?php


class OffenderController extends UserController{
    private $name, $id, $licenceNumber, $tp_no, $address, $nearest_policeStation;
    private $myFinesheet;
    private $myLicence;

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('default');
        $this->myFinesheet = new FinesheetController($controller,$action);
        $this->myLicence = new LicenceController($controller,$action);
    }


    public function myfinesAction(){
        $this->myFinesheet->myfinesAction();
    }

    public function viewAction($sheet_no){
        $this->myFinesheet->viewAction($sheet_no);
    }

    public function mylicenceAction(){
        $this->myLicence->mylicenceAction();
    }

}