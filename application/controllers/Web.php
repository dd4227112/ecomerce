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
		$cartdata = array(
			'id'  => session_create_id('cart'),
		);
		if ($this->session->has_userdata('id')===false) {
			$this->session->set_userdata($cartdata);
		}
    }
	public function index()
	{
		$data['title']='Top products';
		$data['categories'] = $this->Web_model->getCategories();
		$data['products'] = $this->Web_model->getProducts();
		$data['sliders'] = $this->Web_model->getSliders();
		$this->load->view('web/index', $data);
	}
	public function categories(){
		// unset($_SESSION['id']);
		$id = $this->uri->segment('3');
		$data['title']= $this->db->query('SELECT name from categories where id ='.$id)->row()->name;
		$data['categories'] = $this->Web_model->getCategories();
		$data['products'] = $this->Web_model->getProductByCategories($id);
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
		  $customer_id =$this->Web_model->insertCustomer($customerData);


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
}
