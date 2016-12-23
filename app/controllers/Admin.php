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
		$this->load->model('setting_model');
		$this->load->model('blogcategory_model');
		$this->load->model('blog_model');
		$this->load->model('orders_model');
		$this->load->model('slide_model');
		$this->userlogin = $this->session->userdata('userlogin');
	}

	/********************************************************************
	*
	* 
	*/
	public function index()
	{
		$data['_varibles'] = NULL;
		$data['_content'] = 'admin/home';
		$this->load->view('layouts/admin',$data);
	}

	/**********************************************************************
	*
	*cap nhat thong tin user
	*function id 1
	*/
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

	/*
	* thay doi mat khau
	* function id 2
	*/
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

	/*
	* them moi danh muc
	*/
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

	/*
	* quan ly category
	*/
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
				$config['upload_path'] = 'uploads/images/products/';
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
				$config['upload_path'] = 'uploads/images/products/';
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
	public function general_setting()
	{
		if($this->input->post('save_setting'))
		{
			$set_pagetitle = $this->input->post('set_pagetitle',TRUE);
			$set_pagedescriptiton = $this->input->post('set_pagedescriptiton',TRUE);
			$set_pagekeyword = $this->input->post('set_pagekeyword',TRUE);
			$author = $this->input->post('author',TRUE);
			$address = $this->input->post('address',TRUE);
			$phone = $this->input->post('phone',TRUE);
			$email = $this->input->post('email',TRUE);
			$logo = '';
			if($_FILES['logo']['name'] != NULL)
			{
				$config['upload_path'] = 'uploads/images/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload',$config);
				if($this->upload->do_upload('logo'))
					$logo='/'.$config['upload_path'].$this->upload->data('file_name');
			}
			if($this->setting_model->update($set_pagetitle,$set_pagedescriptiton,$set_pagekeyword,$logo,$author,$address,$phone,$email))
				$data['_alert'] = 'alert/success';
			else $data['_alert'] = 'alert/error';
		}
		$data['_varibles'] = NULL;
		$data['_content'] = 'admin/general_setting';
		$this->load->view('layouts/admin',$data);
	}
	public function blogcategory()
	{
		if($this->input->post('delete_records'))
		{
			if($this->blogcategory_model->delete($this->input->post('table_records',TRUE)))
				$data['_alert'] = 'alert/success';
			else $data['_alert'] = 'alert/error';
		}
		$data['_content'] = 'admin/blogcategory';
		$data['_varibles']['blogcategorys'] = $this->blogcategory_model->get_all();
		$this->load->view('layouts/admin',$data);
	}
	public function new_blogcategory()
	{
		if($this->input->post('new_blogcategory'))
		{
			$blogcat_name = $this->input->post('blogcat_name',TRUE);
			$blogcat_seo_title = $this->input->post('blogcat_seo_title',TRUE);
			$blogcat_seo_description = $this->input->post('blogcat_seo_description',TRUE);
			$blogcat_seo_keyword = $this->input->post('blogcat_seo_keyword',TRUE);
			$blogcat_parent_id = $this->input->post('blogcat_parent_id',TRUE);
			$blogcat_description = $this->input->post('blogcat_description');
			$blogcat_image = '';
			if($_FILES['blogcat_image']['name'] != NULL)
			{
				$config['upload_path'] = 'uploads/images/categorys/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload',$config);
				if($this->upload->do_upload('blogcat_image'))
					$blogcat_image='/'.$config['upload_path'].$this->upload->data('file_name');
			}
			if($this->blogcategory_model->insert($blogcat_name,$blogcat_seo_title,$blogcat_seo_description,$blogcat_seo_keyword,$blogcat_parent_id,$blogcat_description,$blogcat_image))
			{
				$data['_alert'] = 'alert/success';
			}
			else
			{
				$data['_alert'] = 'alert/error';
			}
		}
		$data['_varibles']['blogcategorys'] = $this->blogcategory_model->get_all();
		$data['_content'] = 'admin/new_blogcategory';
		$this->load->view('layouts/admin',$data);
	}
	public function update_blogcategory($blogcat_id=0)
	{
		if($blogcat_id == 0) redirect('/admin/blogcategory','refresh');
		if($this->input->post('update_blogcategory'))
		{
			$blogcat_name = $this->input->post('blogcat_name',TRUE);
			$blogcat_seo_title = $this->input->post('blogcat_seo_title',TRUE);
			$blogcat_seo_description = $this->input->post('blogcat_seo_description',TRUE);
			$blogcat_seo_keyword = $this->input->post('blogcat_seo_keyword',TRUE);
			$blogcat_parent_id = $this->input->post('blogcat_parent_id',TRUE);
			$blogcat_description = $this->input->post('blogcat_description');
			$blogcat_image = '';
			if($_FILES['blogcat_image']['name'] != NULL)
			{
				$config['upload_path'] = 'uploads/images/categorys/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload',$config);
				if($this->upload->do_upload('blogcat_image'))
					$blogcat_image='/'.$config['upload_path'].$this->upload->data('file_name');
			}
			if($this->blogcategory_model->update($blogcat_id,$blogcat_name,$blogcat_seo_title,$blogcat_seo_description,$blogcat_seo_keyword,$blogcat_parent_id,$blogcat_description,$blogcat_image))
			{
				$data['_alert'] = 'alert/success';
			}
			else
			{
				$data['_alert'] = 'alert/error';
			}
		}
		$data['_varibles']['blogcategory'] =  $this->blogcategory_model->get($blogcat_id);
		$data['_varibles']['blogcategorys'] = $this->blogcategory_model->get_all();
		$data['_content'] = 'admin/update_blogcategory';
		$this->load->view('layouts/admin',$data);
	}
	public function new_blog()
	{
		if($this->input->post('new_blog'))
		{
			$blog_user_id = $this->userlogin['user_id'];
			$blog_time = time();
			$blog_name = $this->input->post('blog_name',TRUE);
			$blog_seo_title = $this->input->post('blog_seo_title',TRUE);
			$blog_seo_description = $this->input->post('blog_seo_description',TRUE);
			$blog_seo_keyword = $this->input->post('blog_seo_keyword',TRUE);
			$blog_cat_ids = json_encode($this->input->post('blog_cat_ids',TRUE));
			$blog_content = $this->input->post('blog_content');
			$blog_image = '';
			if($_FILES['blog_image']['name'] != NULL)
			{
				$config['upload_path'] = 'uploads/images/categorys/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload',$config);
				if($this->upload->do_upload('blog_image'))
					$blog_image='/'.$config['upload_path'].$this->upload->data('file_name');
			}
			if($this->blog_model->insert($blog_user_id,$blog_time,$blog_name,$blog_seo_title,$blog_seo_description,$blog_seo_keyword,$blog_cat_ids,$blog_content,$blog_image))
			{
				$data['_alert'] = 'alert/success';
			}
			else
			{
				$data['_alert'] = 'alert/error';
			}
		}
		$data['_varibles']['blogcategorys'] = $this->blogcategory_model->get_all();
		$data['_content'] = 'admin/new_blog';
		$this->load->view('layouts/admin',$data);
	}
	public function blogs()
	{
		if($this->input->post('delete_records'))
		{
			if($this->blog_model->delete($this->input->post('table_records',TRUE)))
				$data['_alert'] = 'alert/success';
			else $data['_alert'] = 'alert/error';
		}
		$data['_content'] = 'admin/blog';
		$data['_varibles']['blogs'] = $this->blog_model->get_all();
		$this->load->view('layouts/admin',$data);
	}
	public function update_blog($blog_id=0)
	{
		if($blog_id == 0) redirect('/admin/blogs','refresh');
		if($this->input->post('update_blog'))
		{
			$blog_time = time();
			$blog_name = $this->input->post('blog_name',TRUE);
			$blog_seo_title = $this->input->post('blog_seo_title',TRUE);
			$blog_seo_description = $this->input->post('blog_seo_description',TRUE);
			$blog_seo_keyword = $this->input->post('blog_seo_keyword',TRUE);
			$blog_cat_ids = json_encode($this->input->post('blog_cat_ids',TRUE));
			$blog_content = $this->input->post('blog_content');
			$blog_image = '';
			if($_FILES['blog_image']['name'] != NULL)
			{
				$config['upload_path'] = 'uploads/images/blogs/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload',$config);
				if($this->upload->do_upload('blog_image'))
					$blog_image='/'.$config['upload_path'].$this->upload->data('file_name');
			}
			if($this->blog_model->update($blog_id,$blog_time,$blog_name,$blog_seo_title,$blog_seo_description,$blog_seo_keyword,$blog_cat_ids,$blog_content,$blog_image))
			{
				$data['_alert'] = 'alert/success';
			}
			else
			{
				$data['_alert'] = 'alert/error';
			}
		}
		$data['_varibles']['blog'] =  $this->blog_model->get($blog_id);
		$data['_varibles']['blogcategorys'] = $this->blogcategory_model->get_all();
		$data['_content'] = 'admin/update_blog';
		$this->load->view('layouts/admin',$data);
	}
	public function orders()
	{

		if($this->input->post('delete_records'))
		{
			if($this->orders_model->delete($this->input->post('table_records',TRUE)))
				$data['_alert'] = 'alert/success';
			else $data['_alert'] = 'alert/error';
		}
		if($this->input->post('done_records'))
		{
			if($this->orders_model->done($this->input->post('table_records',TRUE)))
				$data['_alert'] = 'alert/success';
			else $data['_alert'] = 'alert/error';
		}
		if($this->input->post('waitting_records'))
		{
			if($this->orders_model->waitting($this->input->post('table_records',TRUE)))
				$data['_alert'] = 'alert/success';
			else $data['_alert'] = 'alert/error';
		}
		$data['_varibles']['orders'] = $this->orders_model->get_all_detail();
		$data['_content'] = 'admin/orders';
		$this->load->view('layouts/admin',$data);
	}
	public function order_detail($order_id=0,$done=0)
	{
		if($order_id==0) redirect('/admin/orders','refresh');
		if($done==1) $this->orders_model->done($order_id);
		$data['_varibles']['orders'] = $this->orders_model->get($order_id);
		$data['_content'] = 'admin/order_detail';
		$this->load->view('layouts/admin',$data);
	}
	public function new_slide()
	{
		if($this->input->post('new_slide'))
		{
			$slide_link = $this->input->post('slide_link',TRUE);
			$slide_image = '';
			if($_FILES['slide_image']['name'] != NULL)
			{
				$config['upload_path'] = 'uploads/images/slides/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload',$config);
				if($this->upload->do_upload('slide_image'))
					$slide_image='/'.$config['upload_path'].$this->upload->data('file_name');
			}
			if($this->slide_model->insert($slide_link,$slide_image))
			{
				$data['_alert'] = 'alert/success';
			}
			else
			{
				$data['_alert'] = 'alert/error';
			}
		}
		$data['_varibles'] = NULL;
		$data['_content'] = 'admin/new_slide';
		$this->load->view('layouts/admin',$data);
	}
	public function slides()
	{
		if($this->input->post('delete_records'))
		{
			if($this->slide_model->delete($this->input->post('table_records',TRUE)))
				$data['_alert'] = 'alert/success';
			else $data['_alert'] = 'alert/error';
		}
		$data['_varibles']['slides'] = $this->slide_model->get_all();
		$data['_content'] = 'admin/slides';
		$this->load->view('layouts/admin',$data);
	}
	public function update_slide($slide_id=0)
	{
		if($slide_id == 0) redirect('/admin/slides','refresh');
		if($this->input->post('update_slide'))
		{
			$slide_link = $this->input->post('slide_link',TRUE);
			$slide_image = '';
			if($_FILES['slide_image']['name'] != NULL)
			{
				$config['upload_path'] = 'uploads/images/slides/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload',$config);
				if($this->upload->do_upload('slide_image'))
					$slide_image='/'.$config['upload_path'].$this->upload->data('file_name');
			}
			if($this->slide_model->update($slide_id,$slide_link,$slide_image))
			{
				$data['_alert'] = 'alert/success';
			}
			else
			{
				$data['_alert'] = 'alert/error';
			}
		}
		$data['_varibles']['slide'] =  $this->slide_model->get($slide_id);
		$data['_content'] = 'admin/update_slide';
		$this->load->view('layouts/admin',$data);
	}
}
