<?php


class CartItems extends Model{

    public $id,$created_at,$updated_at,$cart_id,$sheet_no,$deleted = 0;

    public function __construct(){
        $table = 'cart_items';
        parent::__construct($table);
        $this->_softDelete = true;
    }

    public function beforeSave(){
        $this->timeStamps();
    }

    public function findBySheetNoOrCreate($cart_id,$sheet_no){
        $item = $this->findFirst([
            'conditions' => "cart_id = ? AND sheet_no = ? AND deleted = 0",
            'bind' => [$cart_id,$sheet_no]
        ]);
        if(!$item){
            $item = new self();
            $item->cart_id = $cart_id;
            $item->sheet_no = $sheet_no;
            $item->complex_save();
        }
        return $item;
    }

    public function addProductToCart($cart_id,$sheet_no){
        $fsModel = new Finesheet();
        $finesheet =$fsModel->findByFinesheet((int)$sheet_no)[0];
        if($finesheet){
            $item = $this->findBySheetNoOrCreate($cart_id,$sheet_no);
        }
        return $item;
    }

    public function findBySheetNo($sheet_no,$cart_id,$params=[]){
        $conditions = [
            'conditions' => 'sheet_no = ? AND cart_id = ? AND deleted = 0',
            'bind' => [$sheet_no,$cart_id]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);
    }

}