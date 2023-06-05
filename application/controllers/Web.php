<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

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
		$this->load->model('Web_model');
		$this->load->library('pagination');
		$cartdata = array(
			'id'  => session_create_id('cart'),
		);
		if ($this->session->has_userdata('id')===false) {
			$this->session->set_userdata($cartdata);
		}
    }
	public function index()
	{
		
		$config = array();
        $config["base_url"] = base_url() . "Web/index";
        $config["total_rows"] = $this->Web_model->record_count();
        $config["per_page"] = 8;
        $config["uri_segment"] = 3;
		$config["prev_link"] = "&lt; Previous";
		$config["next_link"] = "Next &gt;";

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data["products"] = $this->Web_model->fetch_data($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
	
		$data['categories'] = $this->Web_model->getCategories($config["per_page"], $page);
		$data['title'] = "Top Products";
		$data['sliders'] = $this->Web_model->getSliders();
		$this->load->view('web/index', $data);
	}
	public function categories(){
		// unset($_SESSION['id']);
		$id = $this->uri->segment('3');
		$config = array();
        $config["base_url"] = base_url() . "Web/categories/".$id."/";
        $config["total_rows"] = $this->db->query('SELECT COUNT(*) as count FROM products where category_id ='.$id)->row()->count;
        $config["per_page"] = 8;
        $config["uri_segment"] = 4;
		$config["prev_link"] = "&lt; Previous";
		$config["next_link"] = "Next &gt;";

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["links"] = $this->pagination->create_links();
		$data['title']= $this->db->query('SELECT name from categories where id ='.$id)->row()->name;
		$data['categories'] = $this->Web_model->getCategories();
		$data['products'] = $this->Web_model->getProductByCategories($config["per_page"], $page, $id);
		$data['sliders'] = $this->Web_model->getSliders();
		$this->load->view('web/product_categories', $data);
	}
	public function product_detail(){
		$id = $this->uri->segment('3');
		$data['title']='You May Also Like';
		$data['categories'] = $this->Web_model->getCategories();
		$data['product'] =$this->Web_model->getProductDetail($id);
		$data['products'] =$this->Web_model->getOtherProducts($id);
		$data['images'] =$this->Web_model->getProductImagases($id);
		$data['links'] =null;
		$data['total_reviews'] =$this->Web_model->countReviews($id);
		$data['reviews'] =$this->Web_model->getProductReviews($id);

		$this->load->view('web/productdetatils', $data);
	}
	public function Search(){
		$keyword = $this->input->post('search');
		$data['categories'] = $this->Web_model->getCategories();
		$data['products'] = $this->Web_model->searchProducts($keyword);
		if (!empty($data['products'])) {
			$data['title']='Product matching your search';
		}
		else{
			$data['title']='No Product Found';
		}
		$data['links'] =null;
		$data['sliders'] = $this->Web_model->getSliders();
		$this->load->view('web/search', $data);
	}
	public function saveReview(){
		$data= [
			'content' =>$this->input->post('content'),
			'email' =>$this->input->post('email'),
			'name' =>$this->input->post('name'),
			'product_id' =>$this->input->post('product_id'),

		];
		$this->db->insert('reviews', $data);
		return redirect('Web/product_detail/'.$data['product_id']);
	}
	public function countCart(){
		$session_id = $this->uri->segment('3');
		$data = $this->db->query("SELECT  CASE WHEN  COUNT(*) = 0 THEN 0 ELSE COUNT(*) END AS count FROM cart WHERE session_id ='".$session_id."'");
		
		echo json_encode($data->row());
	}
	public function storeCart(){
		$data =[
		'session_id' => $this->uri->segment('3'),
		'product_id' =>$this->input->post('product'),
		'quantity' =>$this->input->post('quantity'),
		];
		$this->db->insert('cart', $data);
		$message = "product added to the cart";
		echo json_encode($message);
	}
	public function cart()
	{

		$data['categories'] = $this->Web_model->getCategories();
		$data['products'] = $this->Web_model->getCartProducts($this->session->userdata('id'));
		$this->load->view('web/cart', $data);
	}
	public function deleteProductCart(){
		$id =$this->input->post('id');
		$this->db->where('id', $id)->delete('cart');
		$message = "product removed from cart";
		echo json_encode($message);
	}
	public function updateProductCart(){
		$id =$this->input->post('id');
		$data=[
			'quantity' =>$this->input->post('quantity'),
		];
		$this->db->where('id', $id)->update('cart', $data);
		$message = "product quantity updated";
		echo json_encode($message);
	}
	public function checkout(){
		if ($this->session->userdata('customer_id')!=NULL || $this->session->userdata('customer_name')!=NULL) {
			$data['customer']= $this->Web_model->getCustomer($this->session->userdata('customer_id'));
		}
		$data['categories'] = $this->Web_model->getCategories();
		$data['products'] = $this->Web_model->getCartProducts($this->session->userdata('id'));
		$this->load->view('web/checkout', $data);
	  }
	  public function saveOrder(){
		//customer data
		$customerData = array(
			'name' => $this->input->post('customer_name'),
			'email' => $this->input->post('customer_email'),
			'mobile' => $this->input->post('customer_mobile'),
			'address' => $this->input->post('customer_address'),
			'country' => $this->input->post('customer_country'),
			'city' => $this->input->post('customer_city'),
			'username' => $this->input->post('customer_username'),
			'password' => sha1($this->input->post('customer_password')),
		  );
		  if ($this->session->userdata('customer_id')!=NULL || $this->session->userdata('customer_name')!=NULL) {
			$customer_id = $this->db->get_where('customers', ['id'=>$this->session->userdata('customer_id')])->row()->id;
		}else{
			$customer_id =$this->Web_model->insertCustomer($customerData);
		}
		  
		//order data
		$products = $this->Web_model->getCartProducts($this->session->userdata('id'));
		$sum =0;
		foreach ($products as $product) {
			$sum +=($product->price * $product->quantity);
		}
		$orderData =[
			'customer_id'=>$customer_id,
			'amount'=>$sum,
			'status' =>'Pending',
			'payment_method' =>$this->input->post('payment_method'),
		];
		$order_id = $this->Web_model->insertOrder($orderData);

			// shipping data
			$shipping_data = $this->input->post('shipping_data');
			if($shipping_data){
				$shippingData = array(
					'name' => $this->input->post('shipping_name'),
					'email' => $this->input->post('shipping_email'),
					'phone' => $this->input->post('shipping_phone'),
					'address' => $this->input->post('shipping_address'),
					'country' => $this->input->post('shipping_country'),
					'city' => $this->input->post('shipping_city'),
					'order_id' =>$order_id
				);
				
			}
			else{
				$shippingData = array(
					'name' => $this->input->post('customer_name'),
					'email' => $this->input->post('customer_email'),
					'phone' => $this->input->post('customer_mobile'),
					'address' => $this->input->post('customer_address'),
					'country' => $this->input->post('customer_country'),
					'city' => $this->input->post('customer_city'),
					'order_id' =>$order_id
				  );

			}
			$this->Web_model->insertShipping($shippingData);
			foreach ($products as $product) {
				$order_items =
						[
							'product_id' =>$product->product_id,
							'quantity' =>$product->quantity,
							'price' =>$product->price,
							'order_id'=>$order_id,
						];
				$this->db->insert('order_items', $order_items);
			}
			if($this->db->where('session_id', $this->session->userdata('id'))->delete('cart')){
			unset($_SESSION['id']);
			return redirect('Web/index');
			}	
	  }
	
	function Login(){
		$username =$this->input->post('username');
		$password =sha1(md5($this->input->post('password')));
		$check_user = $this->Web_model->checkUser($username, $password);
		if($check_user ){
			$userdata =[
				'customer_name' =>$check_user->name,
				'customer_id' =>$check_user->id
			];
			$this->session->set_userdata($userdata);
			$data =['message' =>"You now Login",
			'icon'=>"success"];
			echo json_encode($data);
		}else{
			$data =['message' =>"Incorrect Username or password",
			'icon'=>"error"];
			echo json_encode($data);
		}
	}
	function Logout(){
		unset($_SESSION['customer_name']);
		unset($_SESSION['customer_id']);
		return redirect('Web/index');
	}
	public function about(){
		$data['categories'] = $this->Web_model->getCategories();
		$data['products'] = $this->Web_model->getProducts();
		$data['sliders'] = $this->Web_model->getSliders();
	$this->load->view('web/about', $data);
	}
	public function contact(){
		$data['categories'] = $this->Web_model->getCategories();
		$data['products'] = $this->Web_model->getProducts();
		$data['sliders'] = $this->Web_model->getSliders();
		$this->load->view('web/contact', $data);
	}
	public function saveContact(){
		$data = $this->input->post();
		$this->db->insert('contacts', $data);
		$message ="Thank!! Your request has received";
		echo json_encode($message);
	}
	public function register(){
		$data = $this->input->post();
		$password = $this->input->post('password');
		$password= sha1(md5($password));
		$data['password'] = $password;
		$userdata =[
			'customer_name' =>$this->input->post('name'),
			'customer_id' =>$this->Web_model->insertCustomer($data),
		];
		$this->session->set_userdata($userdata);
		$response =['message' =>"You are welcome. You can continue with shopping",
				'icon'=>"success"];
		echo json_encode($response);
	}
}
