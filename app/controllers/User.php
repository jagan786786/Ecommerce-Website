<?php
class User extends CI_Controller
{
	public function __construct()
	{
		/*call CodeIgniter's default Constructor*/
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('email');

		/*load database libray manually*/
		$this->load->database();
		/*load Model*/
		$this->load->model('User_model');
	}

	public function register()
	{
		/*load registration view form*/
		$this->load->view('Home/header.php');
		$this->load->view('inc/User_registration.php');
		$this->load->view('Home/footer.php');
	}
	public function login()
	{
		/*load registration view form*/
		$this->load->view('Home/header.php');
		$this->load->view('inc/User_login.php');
		$this->load->view('Home/footer.php');
	}
	public function registerUser()
	{
		if ($submit = $this->input->post()) {
			// echo implode('',$submit);
			$this->form_validation->set_rules('name', 'Name', 'required|max_length[30]|callback_validateName');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_emails|callback_validateEmailid');
			$this->form_validation->set_rules('password', 'Password', 'required|max_length[20]|min_length[6]|regex_match[/^\d+(,\d{3})*(\.\d{1,2})?$/]');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password ', 'required|matches[password]');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run()) {
				// die();
				$this->User_model->saverecords($submit);
				redirect('User/register');
				//generate simple random code
				$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$code = substr(str_shuffle($set), 0, 12);
				$config = array(
					'protocol' => 'mail',
					'smtp_host' => 'smtp.gmail.com',
					'smtp_port' => 465,
					'smtp_user' => 'jagannathpatro234@gmail.com',
					// change it to yours
					'smtp_pass' => 'AK47AK786',
					// change it to yours
					'mailtype' => 'html',
					'wordwrap' => TRUE
				);
				$message = "
						<html>
						<head>
							<title>Verification Code</title>
						</head>
						<body>
							<h2>Thank you for Registering.</h2>
							<p>Your Account:</p>
							<p>Email: " . $submit['email'] . "</p>
							<p>Password: " . $submit['password'] . "</p>
							<p>Please click the link below to activate your account.</p>
							<h4><a href='" . base_url() . "User/activate/" . $code . "'>Activate My Account</a></h4>
						</body>
						</html>
						";
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from($config['smtp_user']);
				$this->email->to($submit['email']);
				$this->email->subject('Signup Verification Email');
				$this->email->message($message);
				//sending email
				if ($this->email->send()) {
					$this->session->set_flashdata('message', 'Activation code sent to email');
				} else {
					$this->session->set_flashdata('message', $this->email->print_debugger());
				}
				redirect('User/register');
			} else {
				$this->load->view('Home/header.php');
				$this->load->view('inc/User_registration.php');
				$this->load->view('Home/footer.php');
			}
		}
	}
	public function activate()
	{
		$user_id = $this->uri->segment(3);
		$code = $this->uri->segment(4);
		//fetch user details
		$user = $this->User_model->getuserDetails($user_id);
		//if code matches
		if ($user['code'] == $code) {
			//update user active status
			$data['active'] = true;
			$query = $this->User_model->activate($data, $user_id);

			if ($query) {
				$this->session->set_flashdata('message', 'User activated successfully');
			} else {
				$this->session->set_flashdata('message', 'Something went wrong in activating account');
			}
		} else {
			$this->session->set_flashdata('message', 'Cannot activate account. Code didnt match');
		}
		redirect('User/register');
	}
	public function validateName($name)
	{
		if (!preg_match('/^[a-zA-Z ]+$/', $name)) {
			$this->form_validation->set_message('validateName', 'The name field can only contain alphabets and spaces.');
			return false;
		}
		return true;
	}
	public function loginUser()
	{
		$submit = $this->input->post();
		if ($submit) {
			// $email = $this->input->post('email');
			// $password = $this->input->post('password');
			// $email_password = array(0 => $email, 1 => $password);
			// $imp_details = implode(",", $email_password);
			// print_r($imp_details);
			// die("I imploding");
			$this->form_validation->set_rules('email', 'Email', 'required|valid_emails|callback_validate_user_login');
			$this->form_validation->set_rules('password', 'Password', 'required|max_length[8]|min_length[6]');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			//callback_validate_user_password[' . $email . ']
			if ($this->form_validation->run() == false) {
				/*load registration view form*/
				$this->load->view('Home/header.php');
				$this->load->view('inc/User_login.php');
				$this->load->view('Home/footer.php');
			} else {
				$validUser = $this->User_model->loginUser($submit);
				if ($validUser->role == 0) {
					$this->session->set_userdata('email', $validUser->email);
					$this->session->set_userdata('name', $validUser->name);
					$this->session->set_userdata('user_id', $validUser->user_id);
					$this->session->set_userdata('role', $validUser->role);
					redirect('');
				} elseif ($validUser->role == 1) {
					$this->session->set_userdata('email', $validUser->email);
					$this->session->set_userdata('name', $validUser->name);
					$this->session->set_userdata('user_id', $validUser->user_id);
					$this->session->set_userdata('role', $validUser->role);
					redirect('Admin/admin');
				} else {
					// Error Message 
					// $this->form_validation->set_message('Password is incorrect');
					/*load registration view form*/
					$this->load->view('Home/header.php');
					$this->load->view('inc/User_login.php');
					$this->load->view('Home/footer.php');
				}
			}
		}
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect('');
	}

	public function validateEmailid($key)
	{
		// Check if Email ID exist
		$ValidateEmailid = $this->User_model->validateEmailid($key);
		if ($ValidateEmailid) {
			$this->form_validation->set_message(
				'validateEmailid',
				'Email ID already exist ! Please do use a diffrent email id to register'
			);
			return false;
		} else {
			return true;
		}
	}
	public function validate_user_login($key)
	{
		// Check if Email ID exist
		$ValidateEmailid = $this->User_model->validateEmailid($key);
		if ($ValidateEmailid) {
			return true;
		} else {
			$this->form_validation->set_message(
				'validate_user_login',
				"Email ID doesn't exist ! Please do regsiter"
			);
			return false;
		}
	}
	public function changePassword()
	{
		$this->load->view('Home/header.php');
		$this->load->view('inc/Change_password.php');
		$this->load->view('Home/footer.php');
	}
	public function updatePassword()
	{
		$submit = $this->input->post();
		if ($submit) {
			$this->form_validation->set_rules('current_password', 'Current Password', 'required');
			$this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
			$this->form_validation->set_rules('confirm_password', 'Confirm New Password', 'required|matches[new_password]');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run() == false) {
				// Form validation failed, reload the change password view with error messages
				$this->load->view('Home/header.php');
				$this->load->view('inc/Change_password.php');
				$this->load->view('Home/footer.php');
			} else {
				// Form validation passed, proceed with password update
				$currentPassword = $submit['current_password'];
				$newPassword = $submit['new_password'];
				$userId = $this->session->userdata('user_id');

				// Check if the current password matches the one in the database
				$validUser = $this->User_model->getUserByIdAndPassword($userId, $currentPassword);
				if ($validUser) {
					// Update the user's password
					$this->User_model->updatePassword($userId, $newPassword);
					$this->session->set_flashdata('success_msg', 'Password changed successfully!');
					redirect('User/changePassword');

				} else {
					// Current password is incorrect, show an error message
					$this->form_validation->set_message('updatePassword', 'Current password is incorrect');
					$this->load->view('Home/header.php');
					$this->load->view('inc/Change_password.php');
					$this->load->view('Home/footer.php');
				}
			}
		}
	}

	// public function validate_user_password($key,$email)
	// {
	// 	$exp_details = explode(",", $key);
	// 	$email = $exp_details[0];
	// 	// $password = $exp_details[1];
	// 	print_r($key);
	// 	print_r($email);
	// 	die("I am here");
	// 	// Check if Email ID exist
	// 	$ValidateEmailid = $this->User_model->validate_user_password($key);
	// 	if ($ValidateEmailid) {
	// 		return true;
	// 	} else {
	// 		$this->form_validation->set_message(
	// 			'validate_user_password',
	// 			"Password Incorrect"
	// 		);
	// 		return false;
	// 	}
	// }
}

?>