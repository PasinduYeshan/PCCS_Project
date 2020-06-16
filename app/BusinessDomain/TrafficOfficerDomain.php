<?php

class TrafficOfficerDomain extends PoliceOfficerDomain implements IVisitable{
    private $id_no,$police_id,$officer_name,$branch;
    private $fineSheetList;

    public function __construct($id_no,$param=[])
    {
        if(!count($param)){
            $traffic_officer_model = new TrafficOfficer(); // Create the Model
            $trafficOfficer = $traffic_officer_model->findById($id_no);
            $this->populateObjData($trafficOfficer[0]);
        }else{ //If want to create new Traffic Officer not in database
            $this->id_no = $id_no;
            $this->police_id = $param['police_id'];
            $this->officer_name = $param['officer_name'];
            $this->branch = $param['branch'];
        }
        $this->setOfficerFineSheet();
    }
    
    private function setOfficerFineSheet(){
        $this->fineSheetList = FineSheetDomain::getOfficerFineSheets($this->police_id);
    }

    public static function getBranchOfficers($branchId){
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

    /*-------------------Getters------------------------ */
    public function getIdNo(){return $this->id_no;}

    public function getPoliceId(){return $this->police_id;}

    public function getOfficerName(){return $this->officer_name;}

    public function getBranch(){return $this->branch;}

    public function getTrafficOfficerModel(){return $this->traffic_officer_model;}
    /*------------------------------------------------------*/

    public function accept(IVisitor $visitor){
        $visitor->visitTrafficOfficer($this);
        if(!empty($this->fineSheetList)){
            foreach($this->fineSheetList as $key => $val){
                $val->accept($visitor);
            }
        }
        
    }

    protected function populateObjData($result){
        foreach ($result as $key=>$val){
            $this->$key=$val;
        }
    }
}

