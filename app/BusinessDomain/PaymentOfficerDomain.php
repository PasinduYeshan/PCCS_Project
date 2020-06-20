<?php

class PaymentOfficerDomain extends UserDomain{
    private $id_no,$company;
    private $allDetails;

    public function __construct($id_no,$param=[]){
        if(!count($param)){
            $payment_officer_model = new PaymentOfficer(); // Create the Model
            $PaymentOfficer = $payment_officer_model->findById($id_no);
            $this->populateObjData($paymentOfficer[0]);
        }else{ //If want to create new Payment Officer not in database
            $this->id_no = $id_no;
            $this->company = $param['company'];
        }
    }

    public function getDueFines($fineSheetId){
        $traffic_officer_model = new TrafficOfficer();
        $branchOfficers = $traffic_officer_model->getBranchOfficer($branchId);
        $trafficOfficerList = [];
        if(!empty($branchOfficers)){
            foreach($branchOfficers as $officer=>$details){
                $id = $details->id_no;
                $trafficOfficerList[] = new TrafficOfficerDomain($id);
            }
        }
        return $trafficOfficerList;
    } 

    public function getIdNo(){
        return $this->id_no;
    }

    public function getCompany(){
        return $this->company;
    }

    protected function populateObjData($result){
        foreach ($result as $key=>$val){
            $this->$key=$val;
        }
    }
}