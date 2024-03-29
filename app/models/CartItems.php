<?php


class CartItems extends Model{

    public $id,$created_at,$updated_at,$cart_id,$sheet_no,$deleted = 0;

    public function __construct(){
        $table = 'cart_items';
        parent::__construct($table);
        $this->_softDelete = true;
    }

    /**
     *populate the created at and update at fields whenever saving, implemented with the complex_save() method only
     */
    public function beforeSave(){
        $this->timeStamps();
    }

    /**
     * if an entry that is not soft deleted already is present in Cart_Items table matching cart_id and sheet_no return it
     * else create a new entry in table with cart_id and sheet_no
     * @param $cart_id
     * @param $sheet_no
     * @return array|bool|CartItems
     */
    public function findBySheetNoOrCreate($cart_id, $sheet_no){
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

    /**
     * adding an entry to the Cart_Items table, uses findBySheetNoOrCreate method
     * @param $cart_id
     * @param $sheet_no
     * @return array|bool|CartItems
     */
    public function addFinesheetToCart($cart_id, $sheet_no){
        $fsModel = new Finesheet();
        $finesheet =$fsModel->findByFinesheet((int)$sheet_no)[0];
        if($finesheet){
            $item = $this->findBySheetNoOrCreate($cart_id,$sheet_no);
        }
        return $item;
    }

    /**
     * find and entry that is not soft deleted in Cart_Items matching cart_id and sheet_no
     * @param $sheet_no
     * @param $cart_id
     * @param array $params
     * @return array|bool
     */
    public function findBySheetNo($sheet_no, $cart_id, $params=[]){
        $conditions = [
            'conditions' => 'sheet_no = ? AND cart_id = ? AND deleted = 0',
            'bind' => [$sheet_no,$cart_id]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);
    }

}