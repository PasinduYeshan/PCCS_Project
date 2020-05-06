<?php
class Model {
    protected $_db, $_table, $_modelName , $_softDelete = false, $_columnNames = [];
    public $id;

    public function __construct($table)
    {
        $this->_db = DB::getInstance();
        $this->_table=$table;
        $this->_setTableColumns();
        $this->_modelName = str_replace(' ','',ucwords(str_replace('_',' ',$this->_table)));
    }

    protected function _setTableColumns(){  
        $columns = $this->get_columns();
        foreach ($columns as $column){
            $columnName = $column->Field;
            $this->_columnNames[]=$column->Field;
            $this->{$columnName}=null;
        }
    }

    public function get_columns(){
        return $this->_db->get_columns($this->_table);
    }

    public function find($params = []){ //Return object of Models 
        $results = [];
        $resultsQuery = $this-> _db->find($this->_table , $params);
        foreach($resultsQuery as $result){
            $obj = new $this->_modelName($this-> _table); //Create new Obkect by the table name
            $obj -> populateObjectData($result);
            $results[] = $obj;
        }
        return $results;
    }

    public function findFirst($params = []){ //Return first search item as an object
        $resultsQuery = $this->_db->findFirst($this->_table,$params);
        $result = new $this->_modelName($this->_table);
        $result -> populateObjectData($resultsQuery);
        return $result;
    }

    public function findByID($id){
        return $this->findFirst(['conditions' => "id = ?",'bind' => [$id]]);
    }

    public function save(){ //Save the current object to database
        $fields = [];
        foreach ($this-> _columnNames as $column){
            $fields[$column] = $this->$column; //Get object properties
        }
        //Check whether the data should be inserted or updated
        if (property_exists($this,'id') && $this->id!=''){ //If id exists
            return $this->update($this->id,$fields);
        }
        else{
            return $this->insert($fields);
        }
    }


    public function insert($fields){
        if (empty($fields)){
            return false;
        }else{
            return $this->_db->insert($this->_table,$fields);
        }
    }

    public function update($idField = 'id',$id,$fields=[]){ //Field of Id should be sent too
        if (empty($fields) || $id = ''){
            return false;
        }else{
            return $this->_db->update($this->_table, $idField, $id,$fields);
        }
    }

    public function delete($id='',$idField = 'id'){ //Not like the usual 
        if ($id=='' && $this->id=='')return false;
        $id = ($id=='')? $this->id : $id;
        if($this->_softDelete){
            return $this->update('id',$id,['deleted' => 1]);
        }
        return $this->_db->delete($this->_table,$idField,$id);
    }

    public function query($sql,$bind){
        return $this->_db->query($sql,$bind);
    }

    public function data(){ //Get data object ???
        $data = new stdClass();
        foreach($this->_columnNames as $column){ //?????
            $data ->column = $this->column;
        }
        return $data;
    }

    public function assign($params){ //Assigning values ??
        if(!empty($params)){
            foreach($params as $key => $val){
                if(in_array($key, $this->_columnNames)){
                    $this->$key = sanitize($val);
                }
            }
            return true;
        }
        return false;
    }

    protected function populateObjectData($result){ //Assign each values to the object
        foreach($result as $key => $val){
            $this -> $key = $val;
        }
    }


}