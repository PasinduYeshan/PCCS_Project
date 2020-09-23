<?php


class Transactions extends Model{

    public $id,$created_at, $updated_at, $cart_id, $gateway, $type, $amount, $success = 0;
    public $charge_id, $reason, $card_brand, $last4,$deleted = 0;

    public function __construct()
    {
        $table = 'transactions';
        parent::__construct($table);
        $this->_softDelete = true;
    }


    public function beforeSave(){
        $this->timestamps();

    }


}