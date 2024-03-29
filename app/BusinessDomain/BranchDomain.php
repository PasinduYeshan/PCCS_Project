<?php

class BranchDomain implements IVisitable{
    private $branch_id,$branch_name;
    private $branch_model;
    private $branchTrafficOfficers;

    public function __construct($id_no,$param=[])
    {
        if(!count($param)){
            $this->branch_model = new Branch(); // Create the Model
            $branch = $this->branch_model->findById($id_no);
            if ($branch){
                $this->populateObjData($branch[0]);
            }
            
        }else{ //If want to create new Traffic Officer not in database
            $this->branch_id = $id_no;
            $this->branch_name = $param['branch_name'];
        }
        $this->setBranchTrafficOfficers();
    }

    private function setBranchTrafficOfficers(){
        $this->branchTrafficOfficers = TrafficOfficerDomain::getBranchOfficers($this->branch_id);
    }

    public function getBranchID(){return $this->branch_id;}   //getter

    public function getBranchName(){return $this->branch_name;}

    public function accept(IVisitor $visitor){
        $visitor->visitBranch($this);
        if(!empty($this->branchTrafficOfficers)){
            foreach($this->branchTrafficOfficers as $key => $val){
                //dnd($val);
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

