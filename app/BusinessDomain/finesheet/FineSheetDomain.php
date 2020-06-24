<?php

class FineSheetDomain implements IVisitable{
    private $sheet_no, $vehicle_no, $full_name, $address, $fine_date;
    private $fine_time, $place, $offence, $licence_no, $id_no;
    private $fine, $officer_id, $due_date, $status;
    private $allDetails; //Contain list of all details relevant
    private $currentState;

    public function __construct($sheet_no = "")
    {
        $fineSheetModel = new Finesheet(); // Create the Model
        if($sheet_no!=""){
            $fineSheet = $fineSheetModel->findByFinesheet($sheet_no);
        }
        if ($fineSheet){
            $this->allDetails = $fineSheet[0];
            $this->populateObjData($fineSheet[0]);
        }
        $this->currentState = $this->checkStateWithDB();
    }

    //Give the current state in database 
    public function checkStateWithDB(){
        if ($this->status == 0 ){
            return ActiveFineSheet::getInstance();
        }else if ($this->status == 1 ){
            return PaidFineSheet::getInstance();
        }else if ($this->status == 2 ){
            return OverDueFineSheet::getInstance();
        }else{
            return null;
        }
    }

    public function setState($state){
        $this->currentState = $state;
    }

    public function getCurrentState(){
        return $this->currentState;
    }

    public function accept(IVisitor $visitor){
        $visitor->visitFineSheet($this);
        
    }

    ///Return finesheets by the officer ID
    public static function getOfficerFineSheets($officerId){
        $finesheet_model = new Finesheet();
        $finesheets = $finesheet_model->findByOfficerId($officerId);
        $finesheetList = [];
        foreach($finesheets as $finesheet=>$details){
            $sheet_no = $details->sheet_no;
            $finesheetList[] = new FinesheetDomain($sheet_no);
        }
        return $finesheetList;
    }

    /*---------------Function to change the state-----------*/
    public function pay(){
        $this->currentState->pay($this);
    }

    public function expire(){
        $this->currentState->expire($this);
    }
        
    /*---------Make FineSheet with the Details in database-----------*/
    protected function populateObjData($result){
        foreach ($result as $key=>$val){
            $this->$key=$val;
        }
    }
    
}