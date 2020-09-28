<?php
require ROOT.DS."app".DS."lib".DS."gateways".DS."Gateway.php";
require ROOT.DS."app".DS."lib".DS."gateways".DS."AbstractGateway.php";
require ROOT.DS."app".DS."lib".DS."gateways".DS."StripeGateway.php";
require_once(ROOT.DS."app".DS."lib".DS."stripe".DS."stripe-php".DS."init.php");

class FinecartController extends Controller{

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('default');
        $this->load_model('Finecart');
    }

    public function indexAction(){
        $itemCount = 0;
        $grandTotal = 0.00;
        $items = [];
        if (Cookie::exists(CART_COOKIE_NAME)) {
            $cart_id = Cookie::get(CART_COOKIE_NAME);
            $items = $this->FinecartModel->findAllItemsByCartId((int)$cart_id);
            foreach($items as $item){
                $itemCount += 1;
                $grandTotal += ($item->fine);
            }
            $this->view->cart_id = $cart_id;
        }
        

        $this->view->grandTotal = number_format($grandTotal,2);
        $this->view->itemCount = $itemCount;
        $this->view->items = $items;
        $this->view->render('finecart/index');
    }

    public function addToFineCartAction($sheet_no){
        $cartItemsModel = new CartItems();
        $cart = $this->FinecartModel->findCurrentCartOrCreateNew();
        $item = $cartItemsModel->addProductToCart($cart->id,(int)$sheet_no);
        // $this->view->render('finecart/index');
        Router::redirect('finecart');
    }

    public function removeItemAction($sheet_no){
        $cartItems = new CartItems();
        $cart_id = Cookie::get(CART_COOKIE_NAME);
        $item = $cartItems->findBySheetNo($sheet_no, $cart_id)[0];
        $item->delete($item->id);
        Session::addMsg('info',"Finecart Updated");
        Router::redirect('finecart');
    }


    public function checkoutAction($cart_id){
        $gw = Gateway::build($cart_id);
        if (strtoupper($_SERVER['REQUEST_METHOD'])==='POST'){
            $resp = $gw->processForm(Input::get());
            $tx = $resp['tx'];
            if($resp['success'] != true){
                $tx->addErrorMessage('card-element',$resp['msg']);
            } else {
                //$finesheet = new FineSheetDomain($sheet_no);
                /** $finesheet = $this->FinesheetModel->findByFinesheet($sheet_no)[0];  //because array of 1 element is obtained [0] to get object
                if ($finesheet){
                $finesheet->updateByField('sheet_no', $sheet_no, ['status'=>1]);
                }**/
                foreach ($gw->items as $item):
                    $finesheet = new FineSheetDomain($item->sheet_no);
                    $finesheet->pay();
                    endforeach;

                Router::redirect('finecart/thankYou/'.$tx->id);
            }
        }
        $this->view->grandTotal = $gw->grandTotal;
        $this->view->items = $gw->items;
        $this->view->cart_id = $cart_id;
        $this->view->render($gw->getView());
    }

    public function thankYouAction($tx_id){;
        $txModel = new Transactions();
        $tx = $txModel->findByID($tx_id);
        $this->view->tx = $tx;
        $this->view->render('finecart/thankYou');
    }


}