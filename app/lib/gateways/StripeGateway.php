<?php
require_once(ROOT.DS."app".DS."lib".DS."stripe".DS."stripe-php".DS."init.php");

class StripeGateway extends AbstractGateway
{
    public static $gateway = 'stripe';

    /**
     * return part of url needed for stripe view
     * @return string
     */
    public function getView(){
        return 'card_forms/stripe';
    }

    /**
     * Process the form with the post data
     * @param $post
     * @return array
     * @throws \Stripe\Exception\ApiErrorException
     */
    public function processForm($post){
        $data = [
            'amount' => $this->grandTotal * 100,
            'currency' => 'inr',
            'description' => 'PCCS fine payment: '.$this->itemCount.' finesheets. Cart ID: '.$this->cart_id,
            'source' => $post['stripeToken']
        ];
        $ch = $this->charge($data);
        $this->handleChargeResp($ch);
        $tx = $this->createTransaction($ch);
        if ($this->chargeSuccess){
            $fc = new Finecart();
            $fc->payCart($this->cart_id);
        }
        return ['success'=>$this->chargeSuccess,'msg'=>$this->msgToUser,'tx'=>$tx,'charge_id'=>$ch->id];


    }

    /**
     * creates a Stripe Charge object with the data and return
     * @param $data
     * @return \Stripe\Charge
     * @throws \Stripe\Exception\ApiErrorException
     */
    public function charge($data){
        \Stripe\Stripe::setApiKey(STRIPE_PRIVATE);
        $charge = \Stripe\Charge::create($data);
        return $charge;
    }

    /**
     * Check the transaction is successful or not and get a human-readable description of the outcome type and reason
     * @param $ch
     */
    public function handleChargeResp($ch){
        $this->chargeSuccess = $ch->outcome->network_status == 'approved_by_network';
        $this->msgToUser = $ch->outcome->seller_message;
    }

    /**
     * Saves the transaction details in the database.
     * @param $ch
     * @return Transactions
     */
    public function createTransaction($ch){
        $tx = new Transactions();
        $tx->cart_id = $this->cart_id;
        $tx->gateway = static::$gateway;
        $tx->type = $ch->payment_method_details->type;
        $tx->amount = $this->grandTotal;
        $tx->success = ($this->chargeSuccess)? 1 : 0;
        $tx->charge_id = $ch->id;
        $tx->reason = $ch->outcome->reason;
        $tx->card_brand = $ch->payment_method_details->card->brand;
        $tx->last4 = $ch->payment_method_details->card->last4;
        $tx->complex_save();
        return $tx;
    }

}