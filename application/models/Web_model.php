<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Web_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getCategories(){
       $query = $this->db->get('categories');
       return $query->result();
    }
    
    public function getProducts(){
        $query = $this->db->get('products');
        return $query->result();
     }
     public function getSliders(){
        $query = $this->db->query('SELECT a.*, b.display FROM products a JOIN sliders b on a.id =b.product_id order by b.display desc'); 
       return $query->result();
     }
     public function getProductDetail($id){
      $this->db->where('id', $id);
      $query = $this->db->get('products');
      return $query->row();

     }
     public function getOtherProducts($id){
      $this->db->where('id !=', $id);
      $this->db->limit(4);
      $query = $this->db->get('products');
      return $query->result();

     }
     public function getProductImagases($id){
      $this->db->where('product_id', $id);
      $query = $this->db->get('images');
      return $query->result();
     }
     public function countReviews($id){
      return $this->db->query('SELECT COUNT(*) as reviews FROM reviews WHERE product_id ='.$id)->row();
     }
     public function getProductReviews($id){
      $this->db->where('product_id', $id);
      $query = $this->db->get('reviews');
      return $query->result();
   }
   public function getProductByCategories($id){
      $this->db->where('category_id', $id);
      $query = $this->db->get('products');
      return $query->result();
   }
   public function searchProducts($keyword){
		return $this->db->query("SELECT * FROM products WHERE name LIKE '%".$keyword."%'")->result();
	}
    public function getCartProducts($session_id){
      return $this->db->query("select a.name, a.price, a.image, b.id, b.quantity, b.product_id from cart b join products a on a.id = b.product_id where b.session_id ='".$session_id."'")->result();
    }
    public function insertCustomer($customerData) {
      $this->db->insert('customers', $customerData);
      $insertId = $this->db->insert_id();
      return $insertId;
    }
    public function insertOrder($orderData){
      $this->db->insert('orders', $orderData);
      $insertId = $this->db->insert_id();
      return $insertId;
    }
    public function insertShipping($shippingData){
      return   $this->db->insert('shipping_address', $shippingData);
    }
    public function checkUser($username, $password){
      $data =['username' =>$username,
              'password' =>$password
  ];
      $query = $this->db->where($data)->get('customers');
      return $query->row();
  }
  public function getCustomer($id){
    $query = $this->db->get_where('customers', ['id'=>$id]);
    return $query->row();
  }
}