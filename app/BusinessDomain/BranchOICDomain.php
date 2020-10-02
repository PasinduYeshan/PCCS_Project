<?php

class BranchOICDomain extends PoliceOfficerDomain implements Observer{
    private $id_no,$police_id,$name,$branch,$oic_email;

    public function __construct($id_no,$param=[])
    {
        if(!count($param)){
            $oic_model = new OIC(); // Create the Model
            $branchOIC = $oic_model->findById($id_no);
            ($branchOIC)? $this->populateObjData($branchOIC[0]) : null;
        }else{ //If want to create new Traffic Officer not in database
            $this->id_no = $id_no;
            $this->police_id = $param['police_id'];
            $this->name = $param['officer_name'];
            $this->branch = $param['branch'];
            $this->oic_email = $param['email'];
        }
    }
    

    /*-------------------Getters------------------------ */
    public function getIdNo(){return $this->id_no;}

    public function getPoliceId(){return $this->police_id;}

    public function getOfficerName(){return $this->officer_name;}

    public function getBranch(){return $this->branch;}

    public function getEmail(){return $this->oic_email;}
    /*------------------------------------------------------*/

    /*--------------------Observer-------------------------------*/
    public function update($fineSheet)
    {
        $params = [
            'id_no' => $fineSheet->getOffenderID(),
            'full_name' => $fineSheet->getOffenderName(),
            'address' => $fineSheet->getOffenderAddress(),
            'finesheet_number' => $fineSheet->getSheetNo()
        ];
        if(sendEmail($this->oic_email, $params)){
            $fineSheet->emailSent();
        }else{
        }
    }

    protected function populateObjData($result){
        foreach ($result as $key=>$val){
            $this->$key=$val;
        }
    }
}

