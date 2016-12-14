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
		$this->load->model('categorys_model');
		$this->userlogin = $this->session->userdata('userlogin');
	}
	public function index()
	{
		$data['_varibles'] = NULL;
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
		$data['_varibles'] = NULL;
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
		$data['_varibles'] = NULL;
		$data['_content'] = 'admin/change_password';
		$this->load->view('layouts/admin',$data);
	}
	public function add_product_category()
	{
		if($this->input->post('add_product_category'))
		{
			$cat_name = $this->input->post('cat_name',TRUE);
			$cat_seo_title = $this->input->post('cat_seo_title',TRUE);
			$cat_seo_description = $this->input->post('cat_seo_description',TRUE);
			$cat_seo_keyword = $this->input->post('cat_seo_keyword',TRUE);
			$cat_parent_id = $this->input->post('cat_parent_id',TRUE);
			$cat_description = $this->input->post('cat_description',TRUE);
			$cat_image = '';
			if($_FILES['cat_image']['name'] != NULL)
			{
				$config['upload_path'] = 'uploads/images/categorys/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload',$config);
				if($this->upload->do_upload('cat_image'))
					$cat_image='/'.$config['upload_path'].$this->upload->data('file_name');
			}
			if($this->categorys_model->insert($cat_name,$cat_seo_title,$cat_seo_description,$cat_seo_keyword,$cat_parent_id,$cat_description,$cat_image))
			{
				$data['_alert'] = 'alert/success';
			}
			else
			{
				$data['_alert'] = 'alert/error';
			}
		}
		$data['_varibles']['categorys'] = $this->categorys_model->get_all();
		$data['_content'] = 'admin/add_product_category';
		$this->load->view('layouts/admin',$data);
	}
	public function categorys()
	{
		if($this->input->post('delete_records'))
		{
			if($this->categorys_model->delete($this->input->post('table_records',TRUE)))
				$data['_alert'] = 'alert/success';
			else $data['_alert'] = 'alert/error';
		}
		$data['_content'] = 'admin/categorys';
		$data['_varibles']['categorys'] = $this->categorys_model->get_all();
		$this->load->view('layouts/admin',$data);
	}
	public function new_product()
	{
		if($this->input->post('new_product'))
		{
			
		}
		$data['_varibles']['categorys'] = $this->categorys_model->get_all();
		$data['_content'] = 'admin/new_product';
		$this->load->view('layouts/admin',$data);
	}
}
