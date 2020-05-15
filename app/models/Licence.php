<?php


class Licence extends Model{

    public $licence_no,$id_no,$full_name,$address,$dob,$blood_group,$competent_to_drive,$issue_date,$expiry_date;

    public function __construct()
    {
        $table = 'licence';
        parent::__construct($table);
    }


    public function findById($id_no,$params = []){
        $conditions = [
            'conditions' => 'id_no = ?',
            'bind' => [$id_no]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);
    }

    public function findByNIC($NIC){
        return $this->findFirst(['conditions'=>"id_no = ?",'bind'=>[$NIC]]);
    }

    public function findByLicenceNumber($licence_no){
        return $this->findFirst(['conditions'=>"id_no = ?",'bind'=>[$licence_no]]);
    }


}