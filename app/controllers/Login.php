<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
	}
	public function index()
	{

		// sign up

		// if($this->input->post('create'))
		// {
		// 	$user_name = $this->input->post('user_name',TRUE);
		// 	$user_pass = $this->input->post('user_pass',TRUE);
		// 	$user_email = $this->input->post('user_email',TRUE);

		// 	if($this->users_model->insert($user_name,$user_pass,$user_email))
		// 	{
		// 		$alert['alert']="Sign up success! You can log in now!";
		// 		$this->load->view('alert/success',$alert);
		// 	}
		// 	else
		// 	{
		// 		$alert['alert']="Sign up error! user name already exists!";
		// 		$this->load->view('alert/error',$alert);
		// 	}
		// }

		// log in

		if($this->input->post('login'))
		{
			$user_name = $this->input->post('user_name',TRUE);
			$user_pass = $this->input->post('user_pass',TRUE);

			if($userlogin_result = $this->users_model->verify($user_name,$user_pass))
			{

				// set session and cookie of login
				$this->users_model->update_user_lastlogin($userlogin_result['user_id']);
				$this->session->set_userdata('userlogin',$userlogin_result);
				redirect('/admin','refresh');
			}
			else
			{
				$this->load->view('alert/error');
			}
		}

		// view

		$data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
			);
		$this->load->view('layouts/login',$data);
	}
	public function logout()
	{
		$this->session->unset_userdata('userlogin');
		redirect('/login');
	}
}
