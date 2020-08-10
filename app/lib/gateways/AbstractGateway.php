<?php


abstract class AbstractGateway{

    public $sheet_no,$fine,$fine_date,$fine_time,$due_date,$chargeSuccess=false, $msgToUser='';

    public function __construct($sheet_no){
        $this->sheet_no = $sheet_no;
        $finesheet = new Finesheet();
        $fs = $finesheet->findByFinesheet($sheet_no)[0];
        $this->fine = (float)$fs->fine;
        $this->fine_date = $fs->fine_date;
        $this->fine_time = $fs->fine_time;
        $this->due_date = $fs->due_date;
    }

    abstract public function getView();
    abstract public function processForm($post);
    abstract public function charge($data);
    abstract public function handleChargeResp($ch);
    abstract public function createTransaction($ch);

}