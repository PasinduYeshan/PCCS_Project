<?php 
class BranchReport extends Report{
    private $reportArray;
    public function __construct()
    {
        $offenceModel = new Offence;
        $offences = $offenceModel->findAll();
        $this->createReportArray($offences);
    }

    public function visitBranchGroup(BranchGroup $branchGroup){
    }

    public function visitFineSheet(FineSheetDomain $finesheet)
    {
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