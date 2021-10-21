<?php


class Offender extends Model{
    public $offender_id,$licence_no,$offender_name,$tp_no,$address,$nearest_police_branch;

    public function __construct(){
        $table = 'offender';
        parent::__construct($table);
    }


    public function findById($offender_id,$params = []){
        $conditions = [
            'conditions' => 'offender_id = ?',
            'bind' => [$offender_id]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);
    }

    public function findByLicence($licence_no,$params = []){
        $conditions = [
            'conditions' => 'licence_no = ?',
            'bind' => [$licence_no]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);
    }

    public function findByName($offender_name,$params = []){
        $conditions = [
            'conditions' => 'offender_name = ?',
            'bind' => [$offender_name]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);
    }


    public function findByNearestPoliceBranch($nearest_police_branch,$params = []){
        $conditions = [
            'conditions' => 'nearest_police_branch = ?',
            'bind' => [$nearest_police_branch]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);
    }

    public function findBranchById($offender_id,$params = []){
        $conditions = [
            'conditions' => 'offender_id = ?',
            'bind' => [$offender_id]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions)[0]->nearest_police_branch;
    }


}