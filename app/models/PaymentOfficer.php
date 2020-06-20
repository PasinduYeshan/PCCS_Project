<?php

class PaymentOfficer extends Model{

    public $id_no,$company;

    public function __construct()
    {
        $table = 'payment_officer';
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

    public function findByCompany($company,$params = []){
        $conditions = [
            'conditions' => 'company = ?',
            'bind' => [$branch]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);
    }


}