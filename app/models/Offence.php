<?php


class Offence extends Model{
    public $offence_id,$offence_name,$fine;

    public function __construct(){
        $table = 'offence';
        parent::__construct($table);
    }


    public function findById($offence_id,$params = []){
        $conditions = [
            'conditions' => 'offence_id = ?',
            'bind' => [$offence_id]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);
    }

    public function findByOffenceName($offence_name,$params = []){
        $conditions = [
            'conditions' => 'offence_name = ?',
            'bind' => [$offence_name]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);
    }

    public function findByFine($fine,$params = []){
        $conditions = [
            'conditions' => 'fine = ?',
            'bind' => [$fine]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);
    }

    public function findAll($params = []){
        $conditions = [];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);

    }

    public function getOffence($offence_array,$params = []){
        $offence_name_array = [];
        $offence_array= explode(",",$offence_array);

        foreach ($offence_array as $offence){
            $name = $this->findById($offence)[0]->offence_name;
            $offence_name_array[] = $name;
        }
        return $offence_name_array;

    }
}