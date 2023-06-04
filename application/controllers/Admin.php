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


	function dashboard(){
		$this->authenticate();
		// Orders
		$data['jan'] =$this->db->query("SELECT count(*)  as jan FROM orders where EXTRACT(MONTH FROM date)='01'")->row()->jan;
		$data['feb'] =$this->db->query("SELECT count(*)  as jan FROM orders where EXTRACT(MONTH FROM date)='02'")->row()->jan;
		$data['mar'] =$this->db->query("SELECT count(*)  as jan FROM orders where EXTRACT(MONTH FROM date)='03'")->row()->jan;
		$data['apr'] =$this->db->query("SELECT count(*)  as jan FROM orders where EXTRACT(MONTH FROM date)='04'")->row()->jan;
		$data['may'] =$this->db->query("SELECT count(*)  as jan FROM orders where EXTRACT(MONTH FROM date)='05'")->row()->jan;
		$data['jun'] =$this->db->query("SELECT count(*)  as jan FROM orders where EXTRACT(MONTH FROM date)='06'")->row()->jan;
		$data['jul'] =$this->db->query("SELECT count(*)  as jan FROM orders where EXTRACT(MONTH FROM date)='07'")->row()->jan;
		$data['aug'] =$this->db->query("SELECT count(*)  as jan FROM orders where EXTRACT(MONTH FROM date)='08'")->row()->jan;
		$data['sep'] =$this->db->query("SELECT count(*)  as jan FROM orders where EXTRACT(MONTH FROM date)='09'")->row()->jan;
		$data['oct'] =$this->db->query("SELECT count(*)  as jan FROM orders where EXTRACT(MONTH FROM date)='10'")->row()->jan;
		$data['nov'] =$this->db->query("SELECT count(*)  as jan FROM orders where EXTRACT(MONTH FROM date)='11'")->row()->jan;
		$data['dec'] =$this->db->query("SELECT count(*)  as jan FROM orders where EXTRACT(MONTH FROM date)='12'")->row()->jan;
		
		// Payments
		$data['jan_pay']=$this->db->query("SELECT count(*) as jan FROM order_payments where EXTRACT(MONTH FROM date)='01'")->row()->jan;
		$data['feb_pay']=$this->db->query("SELECT count(*) as jan FROM order_payments where EXTRACT(MONTH FROM date)='02'")->row()->jan;
		$data['mar_pay']=$this->db->query("SELECT count(*) as jan FROM order_payments where EXTRACT(MONTH FROM date)='03'")->row()->jan;
		$data['apr_pay']=$this->db->query("SELECT count(*) as jan FROM order_payments where EXTRACT(MONTH FROM date)='04'")->row()->jan;
		$data['may_pay']=$this->db->query("SELECT count(*) as jan FROM order_payments where EXTRACT(MONTH FROM date)='05'")->row()->jan;
		$data['jun_pay']=$this->db->query("SELECT count(*) as jan FROM order_payments where EXTRACT(MONTH FROM date)='06'")->row()->jan;
		$data['jul_pay']=$this->db->query("SELECT count(*) as jan FROM order_payments where EXTRACT(MONTH FROM date)='07'")->row()->jan;
		$data['aug_pay']=$this->db->query("SELECT count(*) as jan FROM order_payments where EXTRACT(MONTH FROM date)='08'")->row()->jan;
		$data['sep_pay']=$this->db->query("SELECT count(*) as jan FROM order_payments where EXTRACT(MONTH FROM date)='09'")->row()->jan;
		$data['oct_pay']=$this->db->query("SELECT count(*) as jan FROM order_payments where EXTRACT(MONTH FROM date)='10'")->row()->jan;
		$data['nov_pay']=$this->db->query("SELECT count(*) as jan FROM order_payments where EXTRACT(MONTH FROM date)='11'")->row()->jan;
		$data['dec_pay']=$this->db->query("SELECT count(*) as jan FROM order_payments where EXTRACT(MONTH FROM date)='12'")->row()->jan;
 // top five products
        $data['products'] = $this->db->query("select a.name, a.category_id, a.image, a.price, b.product_id, count(b.product_id) as count from order_items b join products a on a.id =b.product_id group by b.product_id order by count DESC LIMIT 5")->result();
//recent orders
		$data['orders'] = $this->Admin_model->getRecentOrders();
		// top customers
        $data['customers'] = $this->db->query("select a.*,  count(b.customer_id) as count from orders b join customers a on a.id =b.customer_id group by b.customer_id order by count DESC LIMIT 5;")->result();
		$date = date('Y-m-d');
		// Get the start date of the week (Monday)
		$startDate = date('Y-m-d 00:00:00', strtotime('monday this week', strtotime($date)));

		// Get the end date of the week (Sunday)
		$endDate = date('Y-m-d 23:59:59', strtotime('sunday this week', strtotime($date)));

		$data['weekly_sales'] = $this->db->query("SELECT sum(amount) as sum from order_payments where date >= '".$startDate."' AND  date <='".$endDate."'")->row();
		$data['weekly_orders'] = $this->db->query("SELECT count(*) as orders from orders where date >= '".$startDate."' AND  date <='".$endDate."'")->row();

		// Get the start date of the week (Monday)
		$startDate = date('Y-m-d 00:00:00', strtotime('monday last week', strtotime($date)));

		// Get the end date of the week (Sunday)
		$endDate = date('Y-m-d 23:59:59', strtotime('sunday last week', strtotime($date)));
		$data['weekly_sales_lastweek']= $this->db->query("SELECT sum(amount) as sum from order_payments where date >= '".$startDate."' AND  date <='".$endDate."'")->row();
		$data['weekly_orders_lastweek']= $this->db->query("SELECT count(*) as orders from orders where date >= '".$startDate."' AND  date <='".$endDate."'")->row();

		//totals
		$data['order']= $this->db->query("SELECT count(*) as orders from orders")->row();
		$data['customer']= $this->db->query("SELECT count(*) as customers from customers")->row();
		$data['product']= $this->db->query("SELECT count(*) as products from products")->row();
		$data['payment']= $this->db->query("SELECT sum(amount) as payments from order_payments")->row();



		$this->load->view('admin/dashboard', $data);
	}
	public function authenticate(){
		if($this->session->userdata('user_id')==NULL || $this->session->userdata('name')==NULL ){
			return redirect('Admin/index');
		}
		return true;
	}

	############# PRODUCTS ######################
	public function product($products =null){
		$this->authenticate();
		$data['header'] = 'My Products';
		$data['products'] = $this->Web_model->getProducts();
		$data['categories'] = $this->Admin_model->getCategories();
		$this->load->view('admin/products', $data);
	}
	public function getProductByCategory(){
		$this->authenticate();
		$id = $this->uri->segment(3);
		$data['products'] = $this->Web_model->getProductByCategories($per_page =null, $page =null, $id);
		$data['header'] = 'Products in '.$this->db->get_where('categories', ['id'=>$id])->row()->name." Category";
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
	function profile(){
		$this->authenticate();
		$data['user']=$this->db->get_where('users', ['id'=>$this->session->userdata('user_id')])->row();
		$this->load->view('admin/profile', $data);
	}
	public function manageUser(){
		echo "Manage user will be here create and delete";
	}
	public function saveProfileInfo(){
		$this->authenticate();
		$id=$this->session->userdata('user_id');
		if (!empty($_FILES['photo']['name'])) {
			// An image is posted
		
			$config['upload_path']   = './admin_files/assets/images/';
			$config['allowed_types'] = 'jpg|png|jpeg|svg|psd';
			$config['max_size']      = 2048;
		
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('photo')) {
				$uploadedData = $this->upload->data();
				$data = $this->input->post();
				$data['photo'] = $uploadedData['file_name'];
				$this->db->where('id', $id)->update('users', $data);
				$this->session->set_flashdata('success', "User information updated successfully");
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
			}
		}
		else{ 
			// No image is posted
			$data = $this->input->post();
			$this->db->where('id', $id)->update('users', $data);
			$this->session->set_flashdata('success', "user information updated successfully");
		}
		return redirect('Admin/profile');
	}
	public function changePassword(){
		$this->authenticate();
		$id =$this->session->userdata('user_id');
		$this->load->view('admin/changePassword');
		if ($_POST) {
			$id =$this->session->userdata('user_id');
			$new =$this->input->post('new');
			$current =$this->input->post('current');
			$confirm =$this->input->post('confirm');
			if ($new!==$confirm) {
			$this->session->set_flashdata('error', "Your Passwords do not match");
			return redirect('Admin/changePassword');
			}else{
				$current =sha1(md5($current));
				$old = $this->db->get_where('users', ['id'=>$id])->row();
				if ($current != $old->password) {
					$this->session->set_flashdata('error', "Incorrect current password");
					return redirect('Admin/changePassword');
				}else{
					$new =sha1(md5($new));
					$this->db->where('id', $id)->update('users', ['password'=>$new]);
					$this->session->set_flashdata('success', "Your password changed successfully");
					return redirect('Admin/changePassword');
				}
			}
		}
	}
	function login(){
		$username =$this->input->post('username');
		$password =sha1(md5($this->input->post('password')));
		$check_user = $this->Admin_model->checkUser($username, $password);
		if($check_user ){
			$userdata =[
				'name' =>$check_user->name,
				'photo' =>$check_user->photo,
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
		unset($_SESSION['photo']);
		return redirect('Admin/index');
	}


	################ ASSOCIATIONS#############
	public function Association(){
		$this->authenticate();
		$dataset = $this->db->query("SELECT id from orders")->result();
		$setup['setups']= $this->db->get('setups')->row();
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
		$this->load->view('admin/association', $setup);
	}
	function separateOrderItems($orders){
		$productIds = array_map(function($item) {
			return $item->name;
		}, $orders);
		
		$string = implode(',', $productIds);
		
		return $string;
	} 
	public function Recommendation(){
		$this->authenticate();
		$data['most_sold_together'] =$this->db->query("select id, name from products where name in (select DISTINCT name from items)")->result();
		$data['sold_separated'] =$this->db->query("select id, name from products where name not in (select DISTINCT name from items)")->result();
		$this->load->view('admin/recommendation', $data);

	}
	public function algorithmSetup(){
		$this->authenticate();
		if($_POST){
			$data = $this->input->post();
			$setups = $this->db->get('setups')->result();
			if(empty($setups)){
				$this->db->insert('setups', $data);
			}
			else{
				$this->db->update('setups', $data);
			}
		}
	$data['setups']= $this->db->get('setups')->result();
		$this->load->view('admin/algorithmsetup', $data);
	}
	public function discount(){
		$this->authenticate();
		$products =$this->db->query("select id, name from products where name not in (select DISTINCT name from items)")->result();
		$percentage = ($this->db->get('setups')->row()->discount_percentage/100);
		foreach ($products as $key => $product) {
			$this->db->query("UPDATE products set  old_price = price, price = (price -(".$percentage." * price)) where id = ".$product->id);
			// echo "UPDATE products set  old_price = price, price = (price -(".$percentage." * price)) where id = ".$product->id;

		}
		$data['header'] = 'Discounted Products';
		$data['categories'] = $this->Admin_model->getCategories();
		$data['note'] ="<small><br>(after discount)</small>";
		$data['products'] = $this->db->query("select * from products where name not in (select DISTINCT name from items)")->result();
		$this->load->view('admin/products', $data);
	}

}
