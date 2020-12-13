<?php

abstract class Report implements IVisitor{
    protected $reportArray;
    protected $fine_date , $due_date;

    public abstract function visitBranchGroup(\BranchGroup $branchGroup);

    public function visitBranch(\BranchDomain $branch)
    {
        
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

    public function visitTrafficOfficer(\TrafficOfficerDomain $officer)
    {
        
    }

    public function createReportArray($offences){
        $reportArray = [];
        $vehicleTypes = file_get_contents(ROOT.DS.'app'.DS.'vehicle.json');
        $vehicleTypes = json_decode($vehicleTypes, true);
        foreach ($vehicleTypes as $key => $vehicle){
            $offenceCount = [];
            foreach ($offences as $offence){
                $offenceCount[$offence->offence_id] = 0;
            }
            $reportArray[$vehicle["vehicle_type"]] = $offenceCount;
        }
        $this->reportArray = $reportArray;
    }

    public function getReportArray(){ return $this->reportArray;}

}