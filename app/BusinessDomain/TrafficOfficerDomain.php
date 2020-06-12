<?php

class TrafficOfficerDomain extends PoliceOfficerDomain{
    private $id_no,$police_id,$officer_name,$branch;
    private $traffic_officer_model;

    public function __construct($id_no,$param=[])
    {
        if(!count($param)){
            $this->traffic_officer_model = new TrafficOfficer(); // Create the Model
            $trafficOfficer = $this->traffic_officer_model->findById($id_no);
            $this->populateObjData($trafficOfficer[0]);
        }else{ //If want to create new Traffic Officer not in database
            $this->id_no = $id_no;
            $this->police_id = $param['police_id'];
            $this->officer_name = $param['officer_name'];
            $this->branch = $param['branch'];
        }
    }
    public function getIdNo(){return $this->id_no;}

    public function getPoliceId(){return $this->police_id;}

    public function getOfficerName(){return $this->officer_name;}

    public function getBranch(){return $this->branch;}

    public function getTrafficOfficerModel(){return $this->traffic_officer_model;}

    protected function populateObjData($result){
        foreach ($result as $key=>$val){
            $this->$key=$val;
        }
    }
}

