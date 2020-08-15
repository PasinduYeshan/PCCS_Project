<?php
require ROOT.DS."app".DS."lib".DS."PHPMailer".DS."PHPMailerAutoload.php";
function dnd($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}

function sanitize($dirty){
    if (is_array($dirty)){                                /////////
        $dirty = implode(",",$dirty);
    }
    return htmlentities($dirty,ENT_QUOTES,'UTF-8');

}

function currentUser(){
    return Users::currentLoggedInUser();
}

function posted_values($post){
    $clean_ary = [];
    foreach ($post as $key => $value){
        $clean_ary[$key] = sanitize($value);
    }
    return $clean_ary;
}

function currentPage(){
    $currentPage = $_SERVER['REQUEST_URI'];
    if ($currentPage == PROOT || $currentPage == PROOT.'home/index'){
        $currentPage = PROOT. 'HomeController';
    }
    return $currentPage;
}

function getObjectProperties($obj){
    return get_object_vars($obj);
}

function sendEmail($email,$params = []){ //Change the details accordingly
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    //$mail->SMTPAutoTLS = false;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    //$mail->isHTML(true);
    $mail->Username = 'emailclienttest69@gmail.com';
    $mail->Password = 'client@69';
    $mail->setFrom("emailclienttest69@gmail.com",'policeLK');
    $mail->addReplyTo('emailclienttest69@gmail.com');
    $mail->Subject = "Arrest this {$params['id_no']} ";
    $mail->Body = "Arrest this guy";
    $mail->isHTML(true);
    $mail->addAddress($email);

    if (!$mail->send()){
        return false;
    }
    else{
        return true;
    }
}
