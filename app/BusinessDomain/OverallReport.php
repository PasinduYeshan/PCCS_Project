<?php
class OverallReport extends Report{
    private $branchGroup;
    protected $trafficOfficers, $fineSheets, $branches;

    public function visitBranchGroup(\BranchGroup $branchGroup){
        $this->branchGroup = $branchGroup;
    }

    public function getBranchGroups(){
        return $this->branchGroup;
    }
    
    public function getFinesheets(){
        return $this->fineSheets;
    }
    public function getTrafficOfficers()
    {
        return $this->trafficOfficers;
    }
    
}