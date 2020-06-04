<?php

class TrafficOfficer extends PoliceOfficer{

    public function __construct($sheet_no)
    {
        //Model should be created for traffic officer 
        $traffic_officer_model = new TrafficOfficer(); // Create the Model
        $trafficOfficer = $fineSheetModel->findByFinesheet($sheet_no);
        $this->allDetails = $fineSheet;
        $this->populateObjData($fineSheet);
        $this->currentState = $this->checkStateWithDB();

    }
}