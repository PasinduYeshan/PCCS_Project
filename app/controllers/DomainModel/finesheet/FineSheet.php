<?php

class FineSheet{
    private $sheet_no, $vehicle_no, $full_name, $address, $fine_date;
    private $fine_time, $place, $offence, $licence_no, $id_no;
    private $fine, $officer_id, $due_date, $status;
    private $allDetails; //Contain list of all details relevant
    private $currentState;

    public function __construct($sheet_no)
    {
        $fineSheetModel = new Finesheet(); // Create the Model
        $fineSheet = $fineSheetModel->findByFinesheet($sheet_no);
        $this->allDetails = $fineSheet;
        $this->populateObjData($fineSheet);
        $this->currentState = $this->checkStateWithDB();

    }

    //Give the current state in database 
    public function checkStateWithDB(){
        if ($this->status == 0 ){
            return new NewFineSheet();
        }else if ($this->status == 1 ){
            return new PaidFineSheet();
        }else if ($this->status == 2 ){
            return new OverDueFineSheet();
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