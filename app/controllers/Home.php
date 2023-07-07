<?php
class Home extends CI_Controller
{
	public function __construct()
	{
		/*call CodeIgniter's default Constructor*/
		parent::__construct();
		/*load database libray manually*/
		$this->load->database();

		/*load Model*/
		$this->load->model('Product_model');

	}
	public function home()
	{
		$results = $this->Product_model->getproductsonly();
		/*load registration view form*/
		$this->load->view('Home/header.php');
		$this->load->view('Home/body.php',['result' => $results]);
		$this->load->view('Home/footer.php');
	}
	
	public function product_view()
	{
		$results = $this->Product_model->getproductsonly();
		/*load registration view form*/
		$this->load->view('inc/Navbar.php');
		$this->load->view('inc/Product_view.php', ['result' => $results]);
	}
	public function about()
	{
		$this->load->view('Nav/about.php');
	}
	public function contact()
	{
		$this->load->view('Nav/contact.php');
	}
}