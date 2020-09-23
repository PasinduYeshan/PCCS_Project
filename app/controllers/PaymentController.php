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

   /** public function checkoutAction($sheet_no){
        $gw = Gateway::build($sheet_no);
        if (strtoupper($_SERVER['REQUEST_METHOD'])==='POST'){
            $resp = $gw->processForm(Input::get());
            $tx = $resp['tx'];
            if($resp['success'] != true){
                $tx->addErrorMessage('card-element',$resp['msg']);
            } else {
                $finesheet = $this->FinesheetModel->findByFinesheet($sheet_no)[0];  //because array of 1 element is obtained [0] to get object
                if ($finesheet){
                    $finesheet->updateByField('sheet_no', $sheet_no, ['status'=>1]);
                }

                Router::redirect('payment/thankYou/'.$tx->sheet_no);
            }
        }
        $this->view->fine = $gw->fine;
        $this->view->fine_date = $gw->fine_date;
        $this->view->fine_time = $gw->fine_time;
        $this->view->due_date = $gw->due_date;
        $this->view->controller = lcfirst($this->_controller);
        $this->view->sheet_no = $sheet_no;
        $this->view->render($gw->getView());
    }

    public function thankYouAction($sheet_no){
        $finesheet = $this->FinesheetModel->findByFinesheet((int)$sheet_no)[0];
        $this->view->finesheet = $finesheet;
        $this->view->render('payment/thankYou');
    }


**/
}