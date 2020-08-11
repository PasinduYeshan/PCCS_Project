<?php

class OffenderDomain extends UserDomain implements Observer{
    private $offender_id,$licence_no,$offender_name,$tp_no,$address,$nearest_police_branch;
    private $offender_model;

    public function __construct($offender_id,$param=[])
    {
        if(!count($param)){
            $this->offender_model = new Offender(); // Create the Model
            $offender = $this->offender_model->findById($offender_id);
            $this->populateObjData($offender[0]);
        }else{ //If want to create new Offender not in database
            $this->offender_id = $offender_id;
            $this->licence_no = $param['licence_no'];
            $this->offender_name = $param['offender_name'];
            $this->tp_no = $param['tp_no'];
            $this->address = $param['address'];
            $this->nearest_police_branch = $param['nearest_police_branch'];
        }
    }
    public function getOffenderId(){return $this->offender_id;}

    public function getLicenceNo(){return $this->licence_no;}

    public function getOffenderName(){return $this->offender_name;}

    public function getTpNo(){return $this->tp_no;}

    public function getAddress(){return $this->address;}

    public function getNearestPoliceBranch(){return $this->nearest_police_branch;}

    public function getOffenderModel(){return $this->offender_model;}

    protected function populateObjData($result){
        foreach ($result as $key=>$val){
            $this->$key=$val;
        }
    }

    public function update($fineSheet)
    {
       
    }
}

