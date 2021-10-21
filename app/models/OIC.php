<?php


class OIC extends Model{
    public $id_no,$police_id,$name,$branch,$oic_email;

    public function __construct(){
        $table = 'oic';
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

    public function findByPoliceID($police_id,$params = []){
        $conditions = [
            'conditions' => 'police_id = ?',
            'bind' => [$police_id]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);
    }

    public function findByName($name,$params = []){
        $conditions = [
            'conditions' => 'name = ?',
            'bind' => [$name]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);
    }

    public function findByBranch($branch,$params = []){
        $conditions = [
            'conditions' => 'branch = ?',
            'bind' => [$branch]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);
    }

    public function findByOIC_email($oic_email,$params = []){
        $conditions = [
            'conditions' => 'oic_email = ?',
            'bind' => [$oic_email]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);
    }

    public function findEmailByBranch($branch,$params = []){
        $conditions = [
            'conditions' => 'branch = ?',
            'bind' => [$branch]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions)[0]->oic_email;
    }
}