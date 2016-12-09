<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	private $userlogin;
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('userlogin'))
			redirect('/login','refresh');
		$this->load->model('users_model');
		$this->userlogin = $this->session->userdata('userlogin');
	}
	public function index()
	{
		$data['_content'] = 'admin/home';
		$this->load->view('layouts/admin',$data);
	}
	public function profile_user()
	{
		if($this->input->post('update_profile'))
		{
			$user_id = $this->userlogin['user_id'];
			$user_fullname = $this->input->post('user_fullname',TRUE);
			$user_name = $this->input->post('user_name',TRUE);
			$user_email = $this->input->post('user_email',TRUE);
			$user_image = '';
			if($_FILES['user_image']['name'] != NULL)
			{
				$config['upload_path'] = 'uploads/images/avatars/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload',$config);
				if($this->upload->do_upload('user_image'))
					$user_image='/'.$config['upload_path'].$this->upload->data('file_name');
			}
			if($this->users_model->update_profile($user_id,$user_fullname,$user_name,$user_email,$user_image))
			{
				$data['_alert'] = 'alert/success';
				if($userlogin = $this->users_model->get_info($user_id))
				{
					$this->session->set_userdata('userlogin',$userlogin);
				}
			}
			else
			{
				$data['_alert'] = 'alert/error';
			}
		}
		$data['_content'] = 'admin/profile_user';
		$this->load->view('layouts/admin',$data);
	}
	public function change_password()
	{
		if($this->input->post('change_password'))
		{
			$old_password = $this->input->post('old_password',TRUE);
			$new_password = $this->input->post('new_password',TRUE);
			if($this->users_model->change_password($this->userlogin['user_id'],$old_password,$new_password))
				$data['_alert'] = 'alert/success';
			else $data['_alert'] = 'alert/error';
		}
		$data['_content'] = 'admin/change_password';
		$this->load->view('layouts/admin',$data);
	}
}
