<?php


class Input{

    public static function sanitize($dirty){
        return htmlentities($dirty,ENT_QUOTES,"UTF-8");
    }

    /*public static function get($input){
        if (isset($_POST[$input])){
            return self::sanitize($_POST[$input]);
        }
        elseif (isset($_GET[$input])){
            return self::sanitize($_GET[$input]);
        }
    }*/

    public static function get($input=false) {
        if(!$input){
            // return entire request array and sanitize it
            $data = [];
            foreach($_REQUEST as $field => $value){
                $data[$field] = trim(sanitize($value));
            }
            return $data;
        }

        return (array_key_exists($input,$_REQUEST))?trim(sanitize($_REQUEST[$input])) : '';
    }
}