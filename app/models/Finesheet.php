<?php


class Finesheet extends Model{

    public $sheet_no,$vehicle_no,$full_name,$address,$fine_date,$fine_time,$place,$vehicletype,$offence,$licence_no,$id_no,$fine,$officer_id,$due_date,$status=0;

    public function __construct()
    {
        $table = 'finesheet';
        parent::__construct($table);
    }


    public static $addValidation = [
        'sheet_no' => [
            'display' => 'Sheet No',
            'required' => true,
            'max' => 10,
            'unique' => 'finesheet'
        ],
        'vehicle_no' => [
            'display' => 'Vehicle No',
            'required' => true,
            'max' => 15
        ],
        'full_name' => [
            'display' => 'Full Name',
            'required' => true,
            'max' => 100
        ],
        'address' => [
            'display' => 'Address',
            'required' => true,
            'max' => 200
        ],
        'fine_date' => [
            'display' => 'Fine Date',
            'required' => true,
            'past_date_check'=> '*',
            'future_date_check'=> '*'
        ],
        'fine_time' => [
            'display' => 'Fine Time',
            'required' => true
        ],
        'place' => [
            'display' => 'Place',
            'required' => true,
            'max' => 50
        ],
        'licence_no' => [
            'display' => 'Licence No',
            'required' => true,
            'max' => 15
        ],
        'id_no' => [
            'display' => 'ID No',
            'required' => true,
            'max' => 15
        ]
    ];


    public function findById($id_no,$params = []){
        $conditions = [
            'conditions' => 'id_no = ?',
            'bind' => [$id_no]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);
    }


    public function findByOfficerId($officer_id,$params=[]){
        $conditions = [
            'conditions' => 'officer_id = ?',
            'bind' => [$officer_id]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);
    }

    public function findByFinesheet($sheet_no,$params=[]){
        $conditions = [
            'conditions' => 'sheet_no = ?',
            'bind' => [$sheet_no]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);
    }

    public function findByIDandFinesheet($id_no,$sheet_no,$params=[]){
        $conditions = [
            'conditions' => 'id_no = ? AND sheet_no = ?',
            'bind' => [$id_no,$sheet_no]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);
    }

    public function findUnpaidById($id_no,$params = []){
        $conditions = [
            'conditions' => 'id_no = ? AND status = ?',
            'bind' => [$id_no,0]
        ];
        $conditions = array_merge($conditions,$params);
        //dnd($conditions);
        return $this->find($conditions);
    }

    public function displaySheetNo(){
        return 'Fine Sheet No : '.$this->sheet_no;
    }

    public function displayDateTimePlace(){
        return 'on '.$this->fine_date.' at '.$this->fine_time.' in '.$this->place;
    }

    public function displayStatus(){
        $paymentStatus = ($this->status==0)?'Unpaid':'Paid';
        return 'Status: '.$paymentStatus;

    }

    public function findBetweenDates($startDate,$endDate,$params = []){
        $conditions = [
            'conditions' => 'fine_date >= ? AND fine_date <= ?',
            'bind' => [$startDate,$endDate]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);

    }

    public function findFineSheetToMail($startDate,$endDate,$params = []){ //To send email
        $fineSheetNumbers = [];
        $conditions = [
            'conditions' => 'due_date >= ? AND due_date <= ? AND notify = 0 AND status != 1',
            'bind' => [$startDate,$endDate]
        ];
        $conditions = array_merge($conditions,$params);
        $result = $this->find($conditions);
        foreach ($result as $fineSheet){
            $fineSheetNumbers[] = $fineSheet->sheet_no;
        }
        return $fineSheetNumbers;
    }

    public function getFinesheetsCount($startDate,$endDate,$vehicletype,$params = []){ //To send email
        $fineSheetNumbers = [];
        $conditions = [
            'conditions' => 'due_date >= ? AND due_date <= ? AND vehicletype = ?',
            'bind' => [$startDate,$endDate,$vehicletype]
        ];
        $conditions = array_merge($conditions,$params);
        $result = $this->find($conditions);
        foreach ($result as $fineSheet){
            $fineSheetNumbers[] = $fineSheet->sheet_no;
        }
        return $fineSheetNumbers;
    }

    public function findWarnings($warningDate,$params = []){
        $fineSheetNumbers = [];
        $conditions = [
            'conditions' => 'due_date == ? status != 1',
            'bind' => [$warningDate]
        ];
        $conditions = array_merge($conditions,$params);
        $result = $this->find($conditions);
        foreach ($result as $fineSheet){
            $fineSheetNumbers[] = $fineSheet->sheet_no;
        }
        return $fineSheetNumbers;
    }

}
