<?php

class BranchGroup{
    private $branches;
    
    public function __construct()
    {
        $branch_model = new Branch(); // Create the Model
        $branchIDs = $branch_model->getAllBranchIDs();
        foreach($branchIDs as $key => $val){
            $this->branches[] = new BranchDomain($val);
        }
    }

    public function accept(IVisitor $visitor){
        $visitor->visitBranchGroup($this);
        if(!empty($this->branches)){
            foreach($this->branches as $key => $val){
                $val->accept($visitor);
            }
        }
    }

}