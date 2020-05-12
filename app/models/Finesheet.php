<?php


class Finesheet extends Model{

    public $sheet_no,$vehicle_no,$full_name,$address,$fine_date,$fine_time,$place,$offence,$licence_no,$id_no,$fine,$officer_id,$due_date,$status=0;

    public function __construct()
    {
        $table = 'finesheet';
        parent::__construct($table);
    }


    public static $addValidation = [
        'sheet_no' => [
            'display' => 'Sheet No',
            'required' => true,
            'max' => 10
        ],
        'vehicle_no' => [
            'display' => 'Vehicle No',
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


    public function findByFinesheet($sheet_no,$params=[]){
        $conditions = [
            'conditions' => 'sheet_no = ?',
            'bind' => [$sheet_no]
        ];
        $conditions = array_merge($conditions,$params);
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




}