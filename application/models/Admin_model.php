<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
public function checkUser($username, $password){
    $data =['username' =>$username,
            'password' =>$password
];
    $query = $this->db->where($data)->get('users');
    return $query->row();
}
 public function getCategories(){
   $query = $this->db->get('categories');
   return $query->result();
 }
 public function getSliders(){
    $query = $this->db->query("SELECT a.name, a.short_description, a.image, b.display, b.id from products a join sliders b on a.id =b.product_id");
    return $query->result();
 }
 public function getOrders(){
    $query =$this->db->query("SELECT a.*, a.id as order_id, b.* from orders a join customers b on a.customer_id =b.id order by a.date DESC");
    return $query->result();
 }
 public function orderPayments(){
    $query = $this->db->query("SELECT a.id, b.id as order_id, a.amount, b.amount as order_amount, (SELECT SUM(amount) FROM order_payments WHERE order_id = b.id) AS paid, (b.amount - (SELECT SUM(amount) FROM order_payments WHERE order_id = b.id)) as unpayed,
    CASE WHEN (b.amount - (SELECT SUM(amount) FROM order_payments WHERE order_id = b.id)) = 0 THEN 'Paid'
    WHEN (b.amount - (SELECT SUM(amount) FROM order_payments WHERE order_id = b.id)) >0 THEN 'Partial'
    WHEN (b.amount - (SELECT SUM(amount) FROM order_payments WHERE order_id = b.id)) <0 THEN 'Over'
    ELSE 'Pending' END AS 'payment_status'
    FROM order_payments a
    LEFT JOIN orders b ON a.order_id = b.id
    GROUP BY b.id;");
    return $query->result();
 }
 public function getCategoryById($id){
    $query = $this->db->where('id', $id)->get('categories');
    return $query->row();
 }
 public function getProductByid($id){
    $query = $this->db->where('id', $id)->get('products');
    return $query->row();
 }
  public function getPaymentHistory($id){
   return $this->db->query("SELECT a.id, a.date, a.amount, a.payed_by, b.name from order_payments a join users b on a.created_by = b.id where a.order_id=".$id)->result();
  }
}