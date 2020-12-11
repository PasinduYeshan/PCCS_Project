<?php


class Finecart extends Model{

    public $id,$created_at,$updated_at,$paid = 0,$deleted = 0;
    public $user_id;

    public function __construct(){
        $table = 'finecart';
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
     * if a cart is already created a cookie exists with name CART_COOKIE_NAME and value cart_id from that can retrieve current cart data
     * else create a new cart and set a cookie with value of newly created cart id
     * @return array|bool|Finecart
     */
    public function findCurrentCartOrCreateNew()
    {
        if(Cookie::exists(CART_COOKIE_NAME)){
            $cart_id = Cookie::get(CART_COOKIE_NAME);
           //dnd(currentUser()->id);
           $cart = $this->findByID((int)$cart_id);
        //    dnd($cart);
           $cart_user_id = $cart->user_id;
        //    dnd($cart_user_id);
           if (currentUser()->id == $cart_user_id){
                $cart = $cart;
           }else{
                $cart = new Finecart();
                $cart->user_id = currentUser()->id; 

                $cart->complex_save();
           }   
        }else{
            
            $cart = new Finecart();
            $cart->user_id = currentUser()->id;
            $cart->complex_save();
        }
        Cookie::set(CART_COOKIE_NAME, $cart->id, CART_COOKIE_EXPIRY);
        return $cart;
    }

    public static function findAllItemsByCartId($cart_id){
        $sql = "SELECT items.*, f.fine, f.due_date FROM cart_items as items JOIN finesheet as f ON f.sheet_no = items.sheet_no WHERE items.cart_id = ? AND items.deleted=0";
        $db = DB::getInstance();
        return $db->query($sql,[(int)$cart_id])->results();

    }

    /**
     * mark the cart as paid in the database and delete the cookie associated with the paid cart
     * @param $cart_id
     * @return array|bool
     */
    public function payCart($cart_id){
        $cart = $this->findByID((int)$cart_id);
        $cart->paid = 1;
        $cart->complex_save();
        Cookie::delete(CART_COOKIE_NAME);
        return $cart;
    }


}