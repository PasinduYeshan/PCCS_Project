<?php

/**
 * factory class, returns the gateway type as defined in the config file
 * Class Gateway
 */
class Gateway{

    public static function build($cart_id){
        if(GATEWAY == 'stripe'){
            return new StripeGateway($cart_id);
        }
    }



}