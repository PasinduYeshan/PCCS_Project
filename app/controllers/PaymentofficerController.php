<?php


class PaymentofficerController extends Controller{
    private $paymentC;

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('default');
        $this->paymentC = new PaymentController($controller,$action);
    }

    public function detailsAction(){
        $this->paymentC->detailsAction();
    }

    public function counterpaymentAction($sheet_no){
        $this->paymentC->counterpaymentAction($sheet_no);
    }

}