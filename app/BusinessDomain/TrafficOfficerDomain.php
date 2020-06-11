<?php

class TrafficOfficerDomain extends PoliceOfficerDomain{
    private $allDetails;
    public function __construct($id_no)
    {
        //Model should be created for traffic officer 
        $traffic_officer_model = new TrafficOfficer(); // Create the Model
        $trafficOfficer = $traffic_officer_model->findById($id_no);
        $this->allDetails = $trafficOfficer;
        $this->populateObjData($trafficOfficer);

    }


    protected function populateObjData($result){
        foreach ($result as $key=>$val){
            $this->$key=$val;
        }
    }
}