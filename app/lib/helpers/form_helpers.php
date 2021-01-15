<?php

function inputBlock($type,$label,$name,$value='',$inputAttrs=[],$divAttrs=[]){
    $divString = stringifyAttrs($divAttrs);
    $inputString = stringifyAttrs($inputAttrs);
    $html = '<div' . $divString . '>';
    $html .= '<label for='.$name.'">'.$label.'</label>';
    $html .= '<input type="'.$type.'" id="'.$name.'" name="'.$name.'" value="'.$value.'"'.$inputString.' />';
    $html .= '</div>';
    return $html;
}

function submitTag($buttonText,$inputAttrs=[]){
    $inputString = stringifyAttrs($inputAttrs);
    $html = '<input type="submit" value="'.$buttonText.'"'.$inputString.' />';
    return $html;
}

function submitBlock($buttonText,$inputAttrs=[],$divAttrs=[]){
    $divString = stringifyAttrs($divAttrs);
    $inputString = stringifyAttrs($inputAttrs);
    $html = '<div'.$divString.'>';
    $html .= '<input type="submit" value="'.$buttonText.'"'.$inputString.' />';
    $html .= '</div>';
    echo $html;
    return $html;
}

function stringifyAttrs($attrs){
    $string = '';
    foreach ($attrs as $key => $val){
        $string .= ' ' . $key . '="' . $val . '"';
    }
    return $string;
}

function generateToken(){
    $token = base64_encode(openssl_random_pseudo_bytes(32));
    Session::set('csrf_token',$token);
    return $token;
}

function checkToken($token){
    return (Session::exists('csrf_token') && Session::get('csrf_token')==$token);
}

function csrfInput(){
    return '<input type="hidden" name="csrf_token" id="csrf_token" value="'.generateToken().'" />';
}