<?php 
class BranchReport extends Report{
    private $reportArray;
    private $fine_date , $due_date;

    public function __construct($fine_date,$due_date)
    {
        $this->fine_date = $fine_date;
        $this->due_date = $due_date;
        $offenceModel = new Offence;
        $offences = $offenceModel->findAll();
        $this->createReportArray($offences);
    }

    public function visitBranchGroup(BranchGroup $branchGroup){
    }

    public function visitFineSheet(FineSheetDomain $finesheet)
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

    public function getFinesheets()
    {
        return $this->fineSheets;
    }

    public function createReportArray($offences){
        $reportArray = [];
        $vehicleTypes = file_get_contents(ROOT.DS.'app'.DS.'vehicle.json');
        $vehicleTypes = json_decode($vehicleTypes, true);
        // foreach ($offences as $offence){
        //     $offenceCount = [];
        //     foreach ($vehicleTypes as $key => $vehicle){
        //         $offenceCount[$vehicle["vehicle_type"]] = 0;
        //     }
        //     $reportArray[$offence->offence_id] = $offenceCount;
        // }
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