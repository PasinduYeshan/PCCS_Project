<?php


class OffenderController extends UserController{
    private $name, $id, $licenceNumber, $tp_no, $address, $nearest_policeStation;
    private $myFinesheet;
    private $myLicence;
    private $paymentC;
    private $OffenderModel;

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('default');
        $this->myFinesheet = new FinesheetController($controller,$action);
        $this->myLicence = new LicenceController($controller,$action);
        $this->paymentC = new PaymentController($controller,$action);
        $this->OffenderModel = new Offender();
    }


    public function myfinesAction(){
        $this->myFinesheet->myfinesAction();
    }
    
    public function duefinesAction(){
        $this->myFinesheet->duefinesAction();
    }
    
    public function viewAction($sheet_no){
        $this->myFinesheet->viewAction($sheet_no);
    }

    public function mylicenceAction(){
        $this->myLicence->mylicenceAction();
    }

}
