<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model');
		$this->load->library('Password_generate');
	}
	public function index()
	{
		echo $this->Password_generate->encode('123456');
		// if($this->input->post('create'))
		// {
		// 	$this->Users_model->insert($this->input->post('user_name',TRUE),$this->input->post('user_pass',TRUE),$this->input->post('user_email',TRUE));
		// }
		$data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
			);
		$this->load->view('layouts/login',$data);
	}
}
