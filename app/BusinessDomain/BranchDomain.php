<?php

class BranchDomain{
    private $branch_id,$branch_name;
    private $branch_model;
    private $branchTrafficOfficers;

    public function __construct($id_no,$param=[])
    {
        if(!count($param)){
            $this->branch_model = new Branch(); // Create the Model
            $branch = $this->branch_model->findById($id_no);
            $this->populateObjData($branch[0]);
        }else{ //If want to create new Traffic Officer not in database
            $this->branch_id = $id_no;
            $this->branch_name = $param['branch_name'];
        }
        $this->setBranchTrafficOfficers();
    }

    private function setBranchTrafficOfficers(){
        $this->branchTrafficOfficers = TrafficOfficerDomain::getBranchOfficers($this->branch_id);
    }
  

    protected function populateObjData($result){
        foreach ($result as $key=>$val){
            $this->$key=$val;
        }
    }
}

