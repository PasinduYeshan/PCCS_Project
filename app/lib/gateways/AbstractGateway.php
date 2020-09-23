<?php


abstract class AbstractGateway{

    public $cart_id,$items,$itemCount=0,$grandTotal=0,$chargeSuccess=false, $msgToUser='';
    //public $sheet_no,$fine,$fine_date,$fine_time,$due_date,$chargeSuccess=false, $msgToUser='';

    public function __construct($cart_id){
        $this->cart_id = $cart_id;
        $this->items = Finecart::findAllItemsByCartId($cart_id);
        foreach ($this->items as $item){
            $this->itemCount += 1;
            $this->grandTotal += $item->fine;
        }

    }

    abstract public function getView();
    abstract public function processForm($post);
    abstract public function charge($data);
    abstract public function handleChargeResp($ch);
    abstract public function createTransaction($ch);

}