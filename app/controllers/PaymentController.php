<?php
require ROOT.DS."app".DS."lib".DS."gateways".DS."Gateway.php";
require ROOT.DS."app".DS."lib".DS."gateways".DS."AbstractGateway.php";
require ROOT.DS."app".DS."lib".DS."gateways".DS."StripeGateway.php";
require_once(ROOT.DS."app".DS."lib".DS."stripe".DS."stripe-php".DS."init.php");


class PaymentController extends Controller{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('default');
        $this->load_model('Finesheet');
    }

    public function detailsAction(){
        if ($_POST){
            $finesheets = $this->FinesheetModel->findUnpaidById($_POST['id_no'],['order'=>'sheet_no']);
            //dnd($finesheets);
            $this->view->finesheets = $finesheets;
            $this->view->controller = lcfirst($this->_controller);
        }

        $this->view->render('payment/details');
    }


    public function counterpaymentAction($sheet_no){
       $finesheet = $this->FinesheetModel->findByFinesheet($sheet_no)[0];  //because array of 1 element is obtained [0] to get object
        if ($finesheet){
            $finesheet->updateByField('sheet_no', $sheet_no, ['status'=>1]);
        }
        Router::redirect(lcfirst($this->_controller).'/details'); 
    }
}