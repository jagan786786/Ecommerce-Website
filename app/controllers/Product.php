<?php
class Product extends CI_Controller
{
	public function __construct()
	{
		/*call CodeIgniter's default Constructor*/
		parent::__construct();
		$this->load->helper("url");

		/*load database libray manually*/
		$this->load->database();

		/*load Model*/
		$this->load->model('Product_model');
	}
	public function product_register()
	{
		/*load registration view form*/
		$this->load->view('Admin/header.php');
		$this->load->view('Admin/Products/register_products.php');
		$this->load->view('Admin/footer.php');
	}
	public function registerProduct()
	{
		if ($submit = $this->input->post()) {
			// echo implode('',$submit);
			$this->form_validation->set_rules('product_name', 'Product Name', 'required');
			$this->form_validation->set_rules('product_summary', 'Product Summary', 'required|max_length[400]');
			$this->form_validation->set_rules('product_cost_price', 'Product Cost Price', 'required|regex_match[/^\d+(,\d{3})*(\.\d{1,2})?$/]');
			$this->form_validation->set_rules('product_selling_price', 'Product Selling Price ', 'required|regex_match[/^\d+(,\d{3})*(\.\d{1,2})?$/]');
			$this->form_validation->set_rules('product_offer', 'Product Offer ', 'required|greater_than[0]|less_than[100]');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			$this->form_validation->set_rules('uploadimage', 'Upload Image', 'trim_rquired');
			if ($this->form_validation->run()) {
				// die();
				$this->Product_model->saverecords($submit);
				redirect('Product/product_register');
			} else {
				$this->load->view('Admin/header.php');
				$this->load->view('Admin/Products/register_products.php');
				$this->load->view('Admin/footer.php');
			}
		}
	}
	public function Productdetails($product_id)
	{
		// Load the necessary model
		$this->load->model('Product_model');
		// Get the product details from the model
		$products = $this->Product_model->getProductDetails($product_id);
		// Pass the product data to the view.
		if ($products && $products->product_delete == 0) {
			// Load the view file to display the product details
			$data['product'] = $products;
			$this->load->view('Home/header.php');
			$this->load->view('inc/Product_details', $data);
			$this->load->view('Home/footer');
		} else {
			redirect('Product/Pagenotfound');
		}
	}
	public function Pagenotfound()
	{
		// $this->output->set_status_header('404');
		$this->load->view('inc/Pagenotfound');
	}
	
}