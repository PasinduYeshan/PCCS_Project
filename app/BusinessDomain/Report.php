<?php

abstract class Report implements IVisitor{
    protected $trafficOfficers, $fineSheets, $branches;
    
    public abstract function visitBranchGroup(\BranchGroup $branchGroup);

    public function visitBranch(\BranchDomain $branch)
    {
        $this->branches[] = $branch;
    }

    public function visitFineSheet(\FineSheetDomain $finesheet)
    {
        $this->fineSheets[] = $finesheet;
    }

    public function visitTrafficOfficer(\TrafficOfficerDomain $officer)
    {
        $this->trafficOfficers[] = $officer;
    }

    public function getFinesheets(){
        return $this->fineSheets;
    }
    public function getTrafficOfficers(){
        return $this->trafficOfficers;
    }

}