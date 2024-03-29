<?php


class Model{
    protected $_db,
              $_table,
              $_modelName,
              $_validates=true,
              $_softDelete = false;
    protected $id;


    public function __construct($table)
    {
        $this->_db = DB::getInstance();
        $this->_table=$table;
        $this->_modelName = str_replace(' ','',ucwords(str_replace('_',' ',$this->_table)));
    }



    public function get_columns(){
        return $this->_db->get_columns($this->_table);
    }

    protected function _softDeleteParams($params){
        if ($this->_softDelete){
            if (array_key_exists('conditions',$params)){
                if (is_array($params['conditions'])){
                    $params['conditions'][] = "deleted != 1";
                }
                else{
                    $params['conditions'] .= " AND deleted != 1";
                }
            }
            else{
                $params['conditions'] = "deleted != 1";
            }
        }
        return $params;
    }

    public function find($params = []){
        $params = $this->_softDeleteParams($params);
        $resultsQuery = $this->_db->find($this->_table,$params,get_class($this));
        if (!$resultsQuery) return [];
        return $resultsQuery;
    }

    public function findFirst($params = []){
        $params = $this->_softDeleteParams($params);
        $resultQuery = $this->_db->findFirst($this->_table,$params,get_class($this));

        return $resultQuery;

    }

    public function findByID($id){
        return $this->findFirst(['conditions'=>"id = ?", 'bind'=>[$id]]);
    }

    public function save(){
        $fields = getObjectProperties($this);

        //determine whether to update or insert
        if (property_exists($this,'id') && $this->id!=''){
            //dnd($this->id);
            return $this->update($this->id,$fields);
        }
        else{
            return $this->insert($fields);
        }
    }

    public function justSave(){ //To save without checking
        $fields = getObjectProperties($this);
        return $this->insert($fields);
    }
    

    public function insert($fields){
        if (empty($fields))return false;
        return $this->_db->insert($this->_table,$fields);
    }

    public function update($id, $fields){
        if (empty($fields) || $id=='')return false;
        return $this->_db->update($this->_table,$id,$fields);
    }

    public function updateByField($fieldname, $id, $fields){                     //*************added because id needed for normal update
        if (empty($fields))return false;
        return $this->_db->updateByField($fieldname,$this->_table,$id,$fields);
    }

    public function delete($id=''){
        if ($id=='' && $this->id=='')return false;
        $id = ($id=='')? $this->id : $id;
        if($this->_softDelete){
            return $this->update($id,['deleted' => 1]);
        }
        return $this->_db->delete($this->_table,$id);
    }

    public function query($sql,$bind=[]){
        return $this->_db->query($sql,$bind);
    }

    public function count(){
        return $this->_db->count();
    }

    public function data() {
        $data = new stdClass();
        foreach(getObjectProperties($this) as $column=>$value) {
            $data->column = $value;
        }
        return $data;
    }

    public function assign($params){
        if (!empty($params)){
            foreach ($params as $key=>$val){
                if (property_exists($this,$key)){
                    $this->$key=sanitize($val);
                }
            }
            return true;
        }
        return false;
    }


    protected function populateObjData($result){
        foreach ($result as $key=>$val){
            $this->$key=$val;
        }
    }

    public function timeStamps(){
        $dt = new DateTime("now", new DateTimeZone("UTC"));
        $now = $dt->format('Y-m-d H:i:s');
        $this->updated_at = $now;
        if($this->isNew()){
            $this->created_at = $now;
        }
    }

    protected function isNew(){
        return (property_exists($this,'id') && !empty($this->id))? false : true;
    }

    public function complex_save() {
        //$this->validator();
        $save = false;
        if($this->_validates){
            $this->beforeSave();
            $fields = $this->getColumnsForSave();
            // determine whether to update or insert
            if($this->isNew()) {
                $save = $this->insert($fields);
                // populate object with the id
                if($save){
                    $this->id = $this->_db->lastID();
                }
            } else {
                $save = $this->update($this->id,$fields);
            }
            // run after save
            if($save){
                $this->afterSave();
            }
        }
        return $save;
    }

    public function beforeSave(){}
    public function afterSave(){}

    public function getColumnsForSave(){
        $columns = $this->get_columns();
        $fields = [];
        foreach($columns as $column){
            $key = $column->Field;
            $fields[$key] = $this->{$key};
        }
        return $fields;
    }

}