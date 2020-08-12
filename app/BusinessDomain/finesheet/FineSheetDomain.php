<?php

class FineSheetDomain implements IVisitable{
    private $sheet_no, $vehicle_no, $full_name, $address, $fine_date;
    private $fine_time, $place, $offence, $licence_no, $id_no;
    public $fine, $officer_id, $due_date, $status, $notify;
    private $allDetails; //Contain list of all details relevant
    private $currentState;
    private $FinesheetModel;
    private $observers;

    public function __construct($sheet_no = "")
    {
        $this->observers = array();
        $this->FinesheetModel = new Finesheet(); // Create the Model
        if($sheet_no!=""){
            $fineSheet = $this->FinesheetModel->findByFinesheet($sheet_no);
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
        }else if ($this->status == 3 ){
            return ClosedFineSheet::getInstance();
        }else{
            return null;
        }
    }

    //Status will be changed immediately when the state changes
    public function setState($state,$state_no){
        $this->currentState = $state;
        $this->status = (string)$state_no;
        if($state instanceof OverDueFineSheet){ //When changin into OverDue state notify all observers
            $this->addObservers();
            $this->notifyObservers();
        }
        $finesheet = $this->FinesheetModel->findByFinesheet($this->sheet_no)[0];
        if ($finesheet){
            $finesheet->updateByField('sheet_no', $this->sheet_no, ['status'=>$state_no]);
        }
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

    public function close(){
        $this->currentState->close($this);
    }

    /*---------------Observer Design pattern Functions-----------*/
    public function addObservers($observer = []){
        if(empty($observer)){ //Get the relavant observers
            $this->observers[] = $this->getBranchOIC();
            $this->observers[] = $this->getOffender();
        }else{
            $this->observers[] = $observer;
        }
        
    }

    public function removeObserver($observer){
        $index = null;
        for ($x = 0; $x < count($this->observers); $x++) {
            if ($this->observers[$x] === $observer){
                $index = $x;
            }
        }
        if ($index != null){
            unset($this->observers[$index]);
        }
    }

    public function notifyObservers(){
        foreach ($this->observers as $observer){
            $observer->update($this);
        }
    }

    public function getBranchOIC(){
        $branch_id = $this->getOffender()->getNearestPoliceBranch();
        $BranchOICmodel = new OIC();
        $branchOIC = $BranchOICmodel->findByBranch($branch_id);
        return new BranchOICDomain($branchOIC[0]->id_no);
    }

    public function getOffender(){
        return new OffenderDomain($this->id_no);
    }

    /*-----------------Getters------------------*/
    public function getOffenderID(){
        return $this->id_no;
    }

    public function getOffenderName(){
        return $this->full_name;
    }

    public function getOffenderAddress(){
        return $this->address;
    }


    /*-------------------Email Sent-------------------------- */
    public function emailSent(){
        $finesheet = $this->FinesheetModel->findByFinesheet($this->sheet_no)[0];
        if ($finesheet){
            $finesheet->updateByField('sheet_no', $this->sheet_no, ['notify'=>1]);
        }
    }

        
    /*---------Make FineSheet with the Details in database-----------*/
    protected function populateObjData($result){
        foreach ($result as $key=>$val){
            $this->$key=$val;
        }
    }

    
}