<?php
class Login_controller extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Login_Model');
		$this->load->library('form_validation');
		
	}

	public function index()
	{
		$this->load->view('log');
	}

	public function login_Validation()
	{
	$this->load->library('form_validation');
			$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','password','required');
		if($this->form_validation->run() === TRUE)
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			if($this->Login_Model->Auth($email,$password))
			{
				$sessionData = array(
					"EmailID" => $email
				);

				$this->session->set_userdata($sessionData);
				redirect(base_url().'Login_controller/welcome');
			}
			else
			{
				$this->session->set_flashdata('error','please check email or password');
				redirect(base_url().'Login_controller');
		
			}
		}
		else
		{
			$this->index();
		}
	}

	public function welcome()
	{
		if($this->session->userdata('EmailID') != '')
		{
			echo "welcome".$this->session->userdata('EmailID');
			echo "<br><a href='".base_url()."Login_controller/logout'>Logout</a>";
		}
		else
		{
			redirect(base_url().'Login_controller');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('EmailID');
		redirect(base_url().'Login_controller');
	}

}