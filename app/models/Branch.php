<?php


class Branch extends Model{
    public $branch_id,$branch_name;

    public function __construct(){
        $table = 'branch';
        parent::__construct($table);
    }


    public function findById($branch_id,$params = []){
        $conditions = [
            'conditions' => 'branch_id = ?',
            'bind' => [$branch_id]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);
    }

    public function findByBranchName($branch_name,$params = []){
        $conditions = [
            'conditions' => 'branch_name = ?',
            'bind' => [$branch_name]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);
    }

    public function getAllBranchIDs(){
        $branches = $this->find();
        $branchIDs = [];
        foreach($branches as $key => $val){
            $branchIDs[] = $val->branch_id;
        }
        return $branchIDs;
    }

    public function findAll($params = []){
        $conditions = [];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);

    }

}