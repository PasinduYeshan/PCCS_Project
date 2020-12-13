<?php 
class BranchReport extends Report{

    public function __construct($fine_date,$due_date)
    {
        $this->fine_date = $fine_date;
        $this->due_date = $due_date;
        $offenceModel = new Offence;
        $offences = $offenceModel->findAll();
        $this->createReportArray($offences);
    }

    public function visitBranchGroup(\BranchGroup $branchGroup){
    }


    
}