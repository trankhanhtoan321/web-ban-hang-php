<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		if(isset($_POST['username']))
		{
			$data=$this->security->xss_clean($this->input->post('username'));
			echo $data;
		}
		$this->load->view('layouts/login');
	}
}
