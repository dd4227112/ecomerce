<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
    {
        parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Web_model');

		
    }
	public function index()
	{

		$this->load->view('admin/index');
	}
	function login(){
		print_r($this->input->post());
		$username =$this->input->post('username');
		$password =sha1(md5($this->input->post('password')));
		$check_user = $this->Admin_model->checkUser($username, $password);
		if($check_user ){
			$userdata =[
				'name' =>$check_user->name,
				'user_id' =>$check_user->id
			];
			$this->session->set_userdata($userdata);
			redirect('Admin/dashboard');
		}else{
			$this->session->set_flashdata('error', "Error!! Login Failed. Username or Password Incorrect");
            redirect($_SERVER['HTTP_REFERER']); 
		}
	}
	function logout(){
		unset($_SESSION['user_id']);
		unset($_SESSION['name']);
		return redirect('Admin/index');
	}
	function dashboard(){
		$this->authenticate();
		$this->load->view('admin/dashboard');
	}
	public function authenticate(){
		if($this->session->userdata('user_id')==NULL || $this->session->userdata('name')==NULL ){
			return redirect('Admin/index');
		}
		return true;
	}
	function profile(){
		$this->authenticate();
	}
	############# PRODUCTS ######################
	public function product($products =null){
		$this->authenticate();
		$data['products'] = $this->Web_model->getProducts();
		$data['categories'] = $this->Admin_model->getCategories();
		$this->load->view('admin/products', $data);
	}
	public function getProductByCategory(){
		$this->authenticate();
		$id = $this->uri->segment(3);
		$data['products'] = $this->Web_model->getProductByCategories($id);
		$this->load->view('admin/products', $data);
	}
	 public function getProductByid(){
		$this->authenticate();
		$id = $this->input->post('product_id');
		$data = $this->Admin_model->getProductByid($id);
		echo json_encode($data);
	 }
	 public function addProduct(){
		$this->authenticate();
		$this->load->view('admin/addProduct');
	 }
	 public function saveProduct(){
		// print_r($_FILES['image']['name']);
		// exit;
		$config['upload_path']   = './web_files/img/'; // Same as specified in config.php
        $config['allowed_types'] = 'jpg|png'; // Same as specified in config.php
        $config['max_size']      = 2048; // Same as specified in config.php

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
			$uploadedData = $this->upload->data();
			$data = $this->input->post();
			$data['image'] = $uploadedData['file_name']; 
			
 			$this->db->insert('products', $data);
			$this->session->set_flashdata('success', "New product added successfully");

        } else {
            // File upload failed
            $error = $this->upload->display_errors();
           $this->session->set_flashdata('error', $error);
		   
        }
		return redirect('Admin/product');
	 }
	 public function deleteProduct(){
		$id = $this->uri->segment(3);
		$product = $this->db->get_where('products', ['id' => $id])->row();
		$imageFilename = $product->image;
		$this->db->where('id', $id)->delete('products');
		$imagePath = './web_files/img/' . $imageFilename;
		if (file_exists($imagePath)) {
			unlink($imagePath);
		}
		return redirect('Admin/product');
	 }
	 public function editProduct(){
		$id = $this->input->post('product_id');
		$product = $this->db->get_where('products', ['id' => $id])->row();
		if (!empty($_FILES['image']['name'])) {
			// An image is posted
	
			$config['upload_path']   = './web_files/img/';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']      = 2048;
	
			$this->load->library('upload', $config);
	
			if ($this->upload->do_upload('image')) {
				$uploadedData = $this->upload->data();
				$data = $this->input->post();
				$data['image'] = $uploadedData['file_name'];
				unset($data['product_id']);	
				$this->db->where('id', $id)->update('products', $data);
				$imageFilename = $product->image;
				$imagePath = './web_files/img/' . $imageFilename;
				if (file_exists($imagePath)) {
					unlink($imagePath);
				}
				$this->session->set_flashdata('success', "Product updated successfully");
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
			}
		} else {
			// No image is posted
			$data = $this->input->post();
			unset($data['product_id']);
			$this->db->where('id', $id)->update('products', $data);
			$this->session->set_flashdata('success', "Product updated successfully");
		}
		return redirect('Admin/product');

	 }
	 public function addProductImage(){
		$config['upload_path']   = './web_files/img/'; // Same as specified in config.php
        $config['allowed_types'] = 'jpg|png'; // Same as specified in config.php
        $config['max_size']      = 2048; // Same as specified in config.php

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
			$uploadedData = $this->upload->data();
			$data = $this->input->post();
			$data['name'] = $uploadedData['file_name']; 
			
 			$this->db->insert('images', $data);
			$this->session->set_flashdata('success', "image added ");

        } else {
            // File upload failed
            $error = $this->upload->display_errors();
           $this->session->set_flashdata('error', $error);
		   
        }
		return redirect('Admin/product');

	 }
	############# CATEGORIES ######################

	public function categories(){
		$this->authenticate();
		$data['categories'] = $this->Admin_model->getCategories();
		$this->load->view('admin/categories', $data);
	}
	public function getCategoryById(){
		$this->authenticate();
		$id = $this->input->post('category');
		$data = $this->Admin_model->getCategoryById($id);
		echo json_encode($data);
	}
	
	public function editCategory(){
		$this->authenticate();
		$data =array('name'=>$this->input->post('name'));
		$this->db->where('id',$this->input->post('id'))->update('categories', $data);
		return redirect('Admin/categories');
	}

	public function addCategory(){
		$this->authenticate();
		$data = $this->input->post();
		if($this->db->insert('categories', $data)){
			return redirect('Admin/categories');
		}
	}
	 public function deleteCategory(){
		$id = $this->uri->segment(3);
		$this->authenticate();
		$this->db->where('id', $id)->delete('categories');
		return redirect('Admin/categories');
	 }
	############# SLIDERS ######################

	public function sliders(){
		$this->authenticate();
		$data['sliders'] = $this->Admin_model->getSliders();
		$data['products'] = $this->Web_model->getProducts();
		$this->load->view('admin/sliders', $data);
		
	}
	public function addSlider(){
		$this->authenticate();
		$data = $this->input->post();
		$this->db->insert('sliders', $data);
		return redirect('Admin/sliders');

	}
	public function deleteSlider(){
		$id = $this->uri->segment(3);
		$this->authenticate();
		$this->db->where('id', $id)->delete('sliders');
		return redirect('Admin/sliders');
	}
	############# ORDERS ######################
	
	public function orders(){
		$this->authenticate();
		$data['orders'] = $this->Admin_model->getOrders();
		$this->load->view('admin/orders', $data);
	}
	public function getOrderShippingAddress(){
		$this->authenticate();
		$id =$this->input->post('order_id');
		$data = $this->db->get_where('shipping_address', ['order_id'=>$id])->row();
		echo json_encode($data);
	}
	public function getOrderItems(){
		$this->authenticate();
		$id =$this->input->post('order_id');
		$data = $this->db->query("SELECT a.name, a.description, b.quantity, b.price from products a join order_items b on a.id =b.product_id where b.order_id =".$id)->result();
		echo json_encode($data);
	}
	
	############# PAYMENTS ######################
	
	public function orderPayments(){
		$this->authenticate();
		$data['payments'] = $this->Admin_model->orderPayments();
		$this->load->view('admin/payment', $data);
		
	}
	public function addPayment(){
		echo "<pre>";
		$data =$this->input->post();
		$data['created_by']=$this->session->userdata('user_id');
		$this->db->insert('order_payments', $data);
		$pay = $this->db->query("SELECT sum(amount) as paid from order_payments where order_id =".$data['order_id'])->row()->paid;
		$total = $this->db->query("SELECT amount from orders where id =".$data['order_id'])->row()->amount;
		if ($total == $pay) {
			$status = 'Payed';
		}else if ($total > $pay && ($pay>0)) {
			$status = 'Partial';

		}
		else if ($total < $pay ) {
			$status = 'Over';
		}else {
			$status ='Pending';
		}
		$this->db->query("UPDATE orders SET status ='".$status."' WHERE id =".$data['order_id']);
		return redirect('Admin/orders');
	}
	 public function getPaymentHistory(){
		$id = $this->input->post('order_id');
		$data = $this->Admin_model->getPaymentHistory($id);
		echo json_encode($data);
	 }
	############# USERS ######################


	################ ASSOCIATIONS#############
	public function Association(){

		$dataset = $this->db->query("SELECT id from orders")->result();
		file_put_contents("dataset.txt", "");
		foreach ($dataset as $key => $value) {
			// echo $value->id."<br>";

		$orders =$this->db->query("SELECT distinct a.name from products a join order_items b on a.id =b.product_id where b.order_id =".$value->id)->result();
		// echo "<br> Order no ".$value->id."<br>";
		// print_r( $items);
		$data = $this->separateOrderItems($orders)."\n";
		file_put_contents("dataset.txt", $data, FILE_APPEND);
		// print_r($items);
		}
		$this->load->view('admin/association');
	}
	function separateOrderItems($orders){
		$productIds = array_map(function($item) {
			return $item->name;
		}, $orders);
		
		$string = implode(',', $productIds);
		
		return $string;
	}

}
