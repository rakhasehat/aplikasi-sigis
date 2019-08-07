<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
		
	}

	public function index()
	{
		if($this->session->userdata('authenticated')){
			redirect('jalan');
		}else
		{
			$this->load->view('v_login');
		}
		
	}

	public function proses_login()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		$user = $this->M_auth->cek_login($username);
		
		if(empty($user)){
			$this->session->set_flashdata('message', 'User tidak ditemukan');
			redirect('login');
		} else{
			if($password == $user->password){
				$session = array(
					'authenticated' => true,
					'id_user' => $user->id_user,
					'username' => $user->username,
					'name' => $user->fullname,
				);

				$this->session->set_userdata($session);
				redirect('jalan');
			} else{
				redirect('login');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

}

/* End of file Admin.php */
