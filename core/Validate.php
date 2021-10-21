<?php


class Validate{
    private $_passed = false,
            $_errors=[],
            $_db=null;

    public function __construct(){
        $this->_db = DB::getInstance();
    }

    public function check($source,$items = [],$csrfCheck=false){
        $this->_errors = [];
        if ($csrfCheck){
            $csrfPass = checkToken($source['csrf_token']);
            if (!isset($source['csrf_token']) || !$csrfPass){
                $this->addError(['Something has gone wrong.','csrf_token']);
            }
        }
        foreach ($items as $item=>$rules){
            $item = Input::sanitize($item);
            $display = $rules['display'];
            foreach ($rules as $rule=>$rule_value){
                $value = Input::sanitize(trim($source[$item]));

                if ($rule === 'required' && empty($value)){
                    $this->addError(["{$display} is required",$item]);
                }
                elseif (!empty($value)){
                    switch ($rule){
                        case 'min':
                            if (strlen($value)<$rule_value){
                                $this->addError(["{$display} must be a minimum of {$rule_value} characters.",$item]);
                            }
                            break;
                        case 'max':
                            if (strlen($value)>$rule_value){
                                $this->addError(["{$display} must be a maximum of {$rule_value} characters.",$item]);
                            }
                            break;
                        case 'matches':
                            if ($value!=$source[$rule_value]){
                                $matchDisplay = $items[$rule_value]['display'];
                                $this->addError(["{$matchDisplay} and {$display} must match.",$item]);
                            }
                            break;
                        case 'unique':
                            $check = $this->_db->query("SELECT {$item} FROM {$rule_value} WHERE {$item} =?",[$value]);
                            if ($check->count()){
                                $this->addError(["{$display} already exists. Please choose another {$display}",$item]);
                            }
                            break;
                        case 'unique_update':
                            $t = explode(',',$rule_value);
                            $table = $t[0];
                            $id = $t[1];
                            $query = $this->_db->query("SELECT * FROM {$table} WHERE id != ? AND {$item} =?",[$id,$value]);
                            if ($query->count()){
                                $this->addError(["{$display} already exists. Please choose another {$display}.",$item]);
                            }
                            break;
                        case 'is_numeric':
                            if (!is_numeric($value)){
                                $this->addError(["{$display} has to be a number. Please use a numeric value.",$item]);
                            }
                            break;
                        case 'valid_email':
                            if (!filter_var($value,FILTER_VALIDATE_EMAIL)){
                                $this->addError(["{$display} must be a valid email address.",$item]);
                            }
                            break;
                        case 'max_value':
                            if ($value>$rule_value){
                                $this->addError(["{$display} must be a maximum {$rule_value}.",$item]);
                            }
                            break;
                        case 'past_date_check':
                            if (date('Y-m-d',strtotime($value))<date('Y-m-d')){
                                $this->addError(["{$display} can not be a past date.",$item]);
                            }
                            break;
                        case 'future_date_check':
                            if (date('Y-m-d',strtotime($value))>date('Y-m-d')){
                                $this->addError(["{$display} can not be a future date.",$item]);
                            }
                            break;
                        case 'exist':
                            $t = explode(',',$rule_value);
                            $table = $t[0];
                            $field = $t[1];
                            $query = $this->_db->query("SELECT {$field} FROM {$table} WHERE {$field} =?",[$value]);
                            if (!$query->count()){
                                $this->addError(["The {$display} you entered doesn't exist.",$item]);
                            }
                            break;
                    }
                }
            }
        }
        if (empty($this->_errors)){
            $this->_passed = true;
        }
        return $this;
    }


    public function addError($error)
    {
        $this->_errors[] = $error;
        if (empty($this->_errors)){
            $this->_passed=true;
        }
        else{
            $this->_passed=false;
        }
    }

    public function errors(){
        return $this->_errors;
    }

    public function passed(){
        return $this->_passed;
    }


    public function displayErrors(){
        $hasErrors = (!empty($this->_errors))? ' has-error' : '';
        $html = '<ul class="bg-danger>'.$hasErrors.'">';
        foreach ($this->_errors as $error){
            if (is_array($error)){
                $html .= '<li class="text-danger">'.$error[0].'</li>';
                $html .= '<script>jQuery("document").ready(function(){jQuery("#'.$error[1].'").parent().closest("div").addClass("has-error");});</script>' ;
            }
            else{
                $html .='<li class="text-danger">'.$error.'</li>';
            }
        }
        $html .= '</ul>';
        return $html;
    }

}
