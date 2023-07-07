<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Admin extends CI_Controller
{
	public function __construct()
	{
		/*call CodeIgniter's default Constructor*/
		parent::__construct();
		$this->load->helper("url");
		$this->load->library('session');
		/*load database libray manually*/
		$this->load->database();
		/*load Model*/
		$this->load->model('Product_model');
		$this->load->model('Admin_model');
	}
	public function admin()
	{
		$data['role'] = $this->session->userdata('role');
		if ($data['role'] == 1) {
			/*load registration view form*/
			$this->load->view('Admin/header.php');
			$this->load->view('Admin/nav.php');
			$this->load->view('Admin/admin.php');
			$this->load->view('Admin/footer.php');
		} elseif ($data['role'] == 0) {
			redirect('');
		} else {
			redirect('Product/Pagenotfound');
		}
	}
	public function view_productsadmin()
	{
		$results = $this->Product_model->getProducts();
		/*load registration view form*/
		$data['role'] = $this->session->userdata('role');
		if ($data['role'] == 1) {
			$this->load->view('Admin/header.php');
			$this->load->view('Admin/nav.php');
			$this->load->view('Admin/Products/View_products.php', ['result' => $results]);
			$this->load->view('Admin/footer.php');
		} elseif ($data['role'] == 0) {
			redirect('');
		} else {
			redirect('Product/Pagenotfound');
		}
	}
	public function product_register()
	{
		/*load registration view form*/
		$data['role'] = $this->session->userdata('role');
		if ($data['role'] == 1) {
			$this->load->view('Admin/header.php');
			$this->load->view('Admin/nav.php');
			$this->load->view('Admin/Products/register_products.php');
			$this->load->view('Admin/footer.php');
		} elseif ($data['role'] == 0) {
			redirect('');
		} else {
			redirect('Product/Pagenotfound');
		}

	}
	public function edit_productsadmin($product_id)
	{
		// Get the product details from the model
		$products = $this->Product_model->getProductDetails($product_id);
		// Pass the product data to the view.
		$data['product'] = $products;
		$data['product_id'] = $product_id;
		$data['role'] = $this->session->userdata('role');
		if ($data['role'] == 1) {
			/*load registration view form*/
			$this->load->view('Admin/header.php');
			$this->load->view('Admin/nav.php');
			$this->load->view('Admin/Products/edit_products.php', $data);
			$this->load->view('Admin/footer.php');
		} elseif ($data['role'] == 0) {
			redirect('');
		} else {
			redirect('Product/Pagenotfound');
		}
	}
	public function update_productsadmin()
	{
		$data['role'] = $this->session->userdata('role');
		if ($data['role'] == 1) {
			/*load registration view form*/
			$this->load->view('Admin/header.php');
			$this->load->view('Admin/nav.php');
			$this->load->view('Admin/Products/edit_products.php', $data);
			$this->load->view('Admin/footer.php');
		} elseif ($data['role'] == 0) {
			redirect('');
		} else {
			redirect('Product/Pagenotfound');
		}
		$submit = $this->input->post();
		echo implode('', $submit);
		if ($submit) {
			$this->form_validation->set_rules('product_name', 'Product Name', 'required');
			$this->form_validation->set_rules('product_summary', 'Product Summary', 'required|max_length[400]');
			$this->form_validation->set_rules('product_cost_price', 'Product Cost Price', 'required|regex_match[/^\d+(,\d{3})*(\.\d{1,2})?$/]');
			$this->form_validation->set_rules('product_selling_price', 'Product Selling Price ', 'required|regex_match[/^\d+(,\d{3})*(\.\d{1,2})?$/]');
			$this->form_validation->set_rules('product_offer', 'Product Offer ', 'required|greater_than[0]|less_than[100]');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			$this->form_validation->set_rules('file-ip-1', 'Upload Image');
			if ($this->form_validation->run() == false) {
				$this->load->view('Admin/header.php');
				$this->load->view('Admin/nav.php');
				$this->load->view('Admin/Products/edit_products.php');
				$this->load->view('Admin/footer.php');
			} else {
				$product_id = $submit['product_id'];
				$validate = $this->Admin_model->update_productsadmin($submit);
				if ($validate) {
					redirect('Admin/edit_productsadmin/' . $product_id);
				} else {
					return false;
				}
			}
		}
	}
	public function delete_product($product_id)
	{
		$product_deleted = $this->Admin_model->delete_product($product_id);
		if ($product_deleted) {
			redirect('Admin/view_productsadmin');
		}
	}
	public function ban_product($product_id)
	{
		$product_deleted = $this->Admin_model->ban_product($product_id);
		if ($product_deleted) {
			redirect('Admin/view_productsadmin');
		}
	}
	public function activate_product($product_id)
	{
		$product_activated = $this->Admin_model->activate_product($product_id);
		if ($product_activated) {
			redirect('Admin/view_productsadmin');
		}
	}
	//User information
	public function view_usersadmin()
	{
		$results = $this->User_model->getusers();
		/*load registration view form*/
		$data['role'] = $this->session->userdata('role');
		if ($data['role'] == 1) {
			$this->load->view('Admin/header.php');
			$this->load->view('Admin/nav.php');
			$this->load->view('Admin/Users/View_users.php', ['result' => $results]);
			$this->load->view('Admin/footer.php');
		} elseif ($data['role'] == 0) {
			redirect('');
		} else {
			redirect('Product/Pagenotfound');
		}
	}
	public function edit_usersadmin($user_id)
	{
		// Get the product details from the model
		$users = $this->User_model->getuserDetails($user_id);
		// Pass the product data to the view.
		$data['user'] = $users;
		$data['user_id'] = $user_id;
		$data['role'] = $this->session->userdata('role');
		if ($data['role'] == 1) {
			/*load registration view form*/
			$this->load->view('Admin/header.php');
			$this->load->view('Admin/nav.php');
			$this->load->view('Admin/Users/edit_users.php', $data);
			$this->load->view('Admin/footer.php');
		} elseif ($data['role'] == 0) {
			redirect('');
		} else {
			redirect('Product/Pagenotfound');
		}
	}
	public function update_usersadmin()
	{
		$data['role'] = $this->session->userdata('role');
		if ($data['role'] == 1) {
			/*load registration view form*/
			$this->load->view('Admin/header.php');
			$this->load->view('Admin/nav.php');
			$this->load->view('Admin/Users/edit_users.php', $data);
			$this->load->view('Admin/footer.php');
		} elseif ($data['role'] == 0) {
			redirect('');
		} else {
			redirect('Product/Pagenotfound');
		}
		$submit = $this->input->post();
		echo implode('', $submit);
		if ($submit) {
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run() == false) {
				$this->load->view('Admin/header.php');
				$this->load->view('Admin/nav.php');
				$this->load->view('Admin/Users/edit_users.php');
				$this->load->view('Admin/footer.php');
			} else {
				$user_id = $submit['user_id'];
				$validate = $this->Admin_model->update_usersadmin($submit);
				$this->session->set_flashdata('success_msg', 'User data updated successfully');
				if ($validate) {
					redirect('Admin/edit_usersadmin/' . $user_id);
				} else {
					return false;
				}
			}
		}
	}
	public function delete_user($user_id)
	{
		$user_deleted = $this->Admin_model->delete_user($user_id);
		if ($user_deleted) {
			redirect('Admin/view_usersadmin');
		}
	}
	public function ban_user($user_id)
	{
		$user_ban = $this->Admin_model->ban_user($user_id);
		$data['role'] = $this->session->userdata('role');
		if ($data['role'] == 1) {
			redirect('Admin/change_user/' . $user_id);
		}
		if ($user_ban) {
			redirect('Admin/view_usersadmin');
		}
	}
	public function activate_user($user_id)
	{
		$user_activated = $this->Admin_model->activate_user($user_id);
		if ($user_activated) {
			redirect('Admin/view_usersadmin');
		}
	}
	//Checking of role of user
	public function change_user($user_id)
	{
		$user_check = $this->Admin_model->change_user($user_id);
		if ($user_check) {
			redirect('Admin/view_usersadmin');
		}
	}
	public function change_admin($user_id)
	{
		//fetch the user_delete from getuserDetails
		$user = $this->User_model->getuserDetails($user_id);
		if ($user && $user->user_delete == 0) {
			$admin_check = $this->Admin_model->change_admin($user_id);
			if ($admin_check) {
				redirect('Admin/view_usersadmin');
			}
		} else {
			$this->session->set_flashdata('error', 'User cannot be converted into an admin.');
			redirect('Admin/view_usersadmin');
		}

	}

}