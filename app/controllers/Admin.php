<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('userlogin'))
			redirect('/login','refresh');
	}
	public function index()
	{
		$data['content'] = 'admin/home';
		$this->load->view('layouts/admin',$data);
	}
	public function profile_user()
	{
		$data['content'] = 'admin/profile_user';
		$this->load->view('layouts/admin',$data);
	}
}
