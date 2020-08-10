<?php
class Gateway{

    public static function build($sheet_no){
        if(GATEWAY == 'stripe'){
            return new StripeGateway($sheet_no);
        }
    }



}