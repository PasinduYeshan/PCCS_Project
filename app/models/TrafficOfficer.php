<?php

class TrafficOfficer extends Model{

    public $id_no,$police_id,$officer_name,$branch;

    public function __construct()
    {
        $table = 'traffic_officer';
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

    public function findByOfficerId($officer_id_no,$params = []){
        $conditions = [
            'conditions' => 'police_id = ?',
            'bind' => [$officer_id_no]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);
    }

    public function getBranchOfficer($branch,$params = []){
        $conditions = [
            'conditions' => 'branch = ?',
            'bind' => [$branch]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);
    }

    public function findByIDandOfficerID($id_no,$officer_id,$params=[]){
        $conditions = [
            'conditions' => 'id_no = ? AND police_id = ?',
            'bind' => [$id_no,$officer_id]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);
    }


}