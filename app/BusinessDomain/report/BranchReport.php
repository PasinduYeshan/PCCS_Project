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

    public function visitFineSheet(\FineSheetDomain $finesheet)
    {
        if(($finesheet->getFineDate() >= $this->fine_date) && ($finesheet->getDueDate() <= $this->due_date)){
            $vehicleType = $finesheet->getVehicleType();
            $offences = $finesheet->getOffenceArray();
            foreach($this->reportArray as $vehicle => $offenceType){
                if($vehicle == $vehicleType){
                    foreach ($offences as $offence){
                        $this->reportArray[$vehicle][$offence] += 1;
                    }
                }
            }
        }
          
    }


    
}