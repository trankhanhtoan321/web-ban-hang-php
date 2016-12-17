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
		$this->load->model('products_model');
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
			$cat_description = $this->input->post('cat_description');
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
	public function products()
	{
		if($this->input->post('delete_records'))
		{
			if($this->products_model->delete($this->input->post('table_records',TRUE)))
				$data['_alert'] = 'alert/success';
			else $data['_alert'] = 'alert/error';
		}
		$data['_content'] = 'admin/products';
		$data['_varibles']['products'] = $this->products_model->get_all();
		$this->load->view('layouts/admin',$data);
	}
	public function new_product()
	{
		if($this->input->post('new_product'))
		{
			$pro_name = $this->input->post('pro_name',TRUE);
			$pro_sku = $this->input->post('pro_sku',TRUE);
			$pro_description = $this->input->post('pro_description');
			$pro_shortdescripttion = $this->input->post('pro_shortdescripttion');
			$pro_seo_title = $this->input->post('pro_seo_title',TRUE);
			$pro_seo_description = $this->input->post('pro_seo_description',TRUE);
			$pro_seo_keyword = $this->input->post('pro_seo_keyword',TRUE);
			$pro_price = $this->input->post('pro_price',TRUE);
			$pro_price_sale = 0;
			$pro_price_sale_date_begin = 0;
			$pro_price_sale_date_finish = 0;
			if($this->input->post('use_sale_price') == 1)
			{
				$pro_price_sale = $this->input->post('pro_price_sale',TRUE);
				$pro_date_sale = $this->input->post('pro_date_sale',TRUE);
				$timetkt = explode("-", $pro_date_sale);
				$pro_price_sale_date_begin = strtotime($timetkt[0]);
				$pro_price_sale_date_finish = strtotime($timetkt[1]);
			}
			$pro_image = '';
			if($_FILES['pro_image']['name'] != NULL)
			{
				$config['upload_path'] = 'uploads/images/categorys/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload',$config);
				if($this->upload->do_upload('pro_image'))
					$pro_image='/'.$config['upload_path'].$this->upload->data('file_name');
			}
			$pro_cat_ids = json_encode($this->input->post('pro_cat_ids',TRUE));
			if($this->products_model->insert($pro_sku,$pro_name,$pro_description,$pro_shortdescripttion,$pro_seo_title,$pro_seo_description,$pro_seo_keyword,$pro_price,$pro_price_sale,$pro_price_sale_date_begin,$pro_price_sale_date_finish,$pro_image,$pro_cat_ids))
				$data['_alert'] = 'alert/success';
			else $data['_alert'] = 'alert/error';
		}
		$data['_varibles']['categorys'] = $this->categorys_model->get_all();
		$data['_content'] = 'admin/new_product';
		$this->load->view('layouts/admin',$data);
	}
	public function update_product($pro_id=0)
	{
		if($pro_id == 0) redirect('/admin/products','refresh');
		if($this->input->post('update_product'))
		{
			$pro_name = $this->input->post('pro_name',TRUE);
			$pro_sku = $this->input->post('pro_sku',TRUE);
			$pro_description = $this->input->post('pro_description');
			$pro_shortdescripttion = $this->input->post('pro_shortdescripttion');
			$pro_seo_title = $this->input->post('pro_seo_title',TRUE);
			$pro_seo_description = $this->input->post('pro_seo_description',TRUE);
			$pro_seo_keyword = $this->input->post('pro_seo_keyword',TRUE);
			$pro_price = $this->input->post('pro_price',TRUE);
			$pro_price_sale = 0;
			$pro_price_sale_date_begin = 0;
			$pro_price_sale_date_finish = 0;
			if($this->input->post('use_sale_price') == 1)
			{
				$pro_price_sale = $this->input->post('pro_price_sale',TRUE);
				$pro_date_sale = $this->input->post('pro_date_sale',TRUE);
				$timetkt = explode("-", $pro_date_sale);
				$pro_price_sale_date_begin = strtotime($timetkt[0]);
				$pro_price_sale_date_finish = strtotime($timetkt[1]);
			}
			$pro_image = '';
			if($_FILES['pro_image']['name'] != NULL)
			{
				$config['upload_path'] = 'uploads/images/categorys/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload',$config);
				if($this->upload->do_upload('pro_image'))
					$pro_image='/'.$config['upload_path'].$this->upload->data('file_name');
			}
			$pro_cat_ids = json_encode($this->input->post('pro_cat_ids',TRUE));
			if($this->products_model->update($pro_id,$pro_sku,$pro_name,$pro_description,$pro_shortdescripttion,$pro_seo_title,$pro_seo_description,$pro_seo_keyword,$pro_price,$pro_price_sale,$pro_price_sale_date_begin,$pro_price_sale_date_finish,$pro_image,$pro_cat_ids))
				$data['_alert'] = 'alert/success';
			else $data['_alert'] = 'alert/error';
		}
		$data['_varibles']['product'] = $this->products_model->get($pro_id);
		$data['_varibles']['categorys'] = $this->categorys_model->get_all();
		$data['_content'] = 'admin/update_product';
		$this->load->view('layouts/admin',$data);
	}
	public function update_category($cat_id = 0)
	{
		if($cat_id == 0) redirect('/admin/categorys','refresh');
		if($this->input->post('update_category'))
		{
			$cat_name = $this->input->post('cat_name',TRUE);
			$cat_seo_title = $this->input->post('cat_seo_title',TRUE);
			$cat_seo_description = $this->input->post('cat_seo_description',TRUE);
			$cat_seo_keyword = $this->input->post('cat_seo_keyword',TRUE);
			$cat_parent_id = $this->input->post('cat_parent_id',TRUE);
			$cat_description = $this->input->post('cat_description');
			$cat_image = '';
			if($_FILES['cat_image']['name'] != NULL)
			{
				$config['upload_path'] = 'uploads/images/categorys/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload',$config);
				if($this->upload->do_upload('cat_image'))
					$cat_image='/'.$config['upload_path'].$this->upload->data('file_name');
			}
			if($this->categorys_model->update($cat_id,$cat_name,$cat_seo_title,$cat_seo_description,$cat_seo_keyword,$cat_parent_id,$cat_description,$cat_image))
			{
				$data['_alert'] = 'alert/success';
			}
			else
			{
				$data['_alert'] = 'alert/error';
			}
		}
		$data['_varibles']['category'] = $this->categorys_model->get($cat_id);
		$data['_varibles']['categorys'] = $this->categorys_model->get_all();
		$data['_content'] = 'admin/update_category';
		$this->load->view('layouts/admin',$data);
	}
}
