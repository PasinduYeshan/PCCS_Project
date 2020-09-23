<?php
class Gateway{

    public static function build($cart_id){
        if(GATEWAY == 'stripe'){
            return new StripeGateway($cart_id);
        }
    }



}