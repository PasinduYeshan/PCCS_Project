<?php

class HomeController extends Controller {
    private $reportArray;
    public function __construct($controller, $action){
        parent::__construct($controller, $action);

        // $reportArray = [];
        // $vehicleTypes = file_get_contents(ROOT.DS.'app'.DS.'vehicle.json');
        // $vehicleTypes = json_decode($vehicleTypes, true);
        // // foreach ($offences as $offence){
        // //     $offenceCount = [];
        // //     foreach ($vehicleTypes as $key => $vehicle){
        // //         $offenceCount[$vehicle["vehicle_type"]] = 0;
        // //     }
        // //     $reportArray[$offence->offence_id] = $offenceCount;
        // // }
        // $offenceModel = new Offence;
        // $offences = $offenceModel->findAll();
        // foreach ($vehicleTypes as $key => $vehicle){
        //     $offenceCount = [];
        //     foreach ($offences as $offence){
        //         $offenceCount[$offence->offence_id] = 0;
        //     }
        //     $reportArray[$vehicle["vehicle_type"]] = $offenceCount;
        // }
        // $this->reportArray = $reportArray;

    }

    public function indexAction(){
        // $vehicleType = "SLTB";
        // $offences = ["2","4","2","3"];
        // foreach($this->reportArray as $vehicle => $offenceType){
        //     if($vehicle == $vehicleType){
        //         foreach ($offences as $offence){
        //             $this->reportArray[$vehicle][$offence] += 1;
        //         }
        //     }
        // }
        
        //This is how we can get the aray for the report
        $branch_id = 3;
        $branchReport = new BranchReport();
        $branch = new BranchDomain($branch_id);
        $branch->accept($branchReport);
        $reportArray = $branchReport->getReportArray();
        dnd($reportArray);
        $this->view->render('home/index');
    }
}