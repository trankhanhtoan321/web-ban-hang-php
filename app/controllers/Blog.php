<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('setting_model');
		$this->load->model('blogcategory_model');
		$this->load->model('products_model');
		$this->load->model('blog_model');
		$this->load->model('categorys_model');
	}
	public function index()
	{
		
	}
	public function detail($blog_id=0)
	{
		if($blog_id==0) redirect('/blog','refresh');
		$this->blog_model->increase_views($blog_id);
		$data['_varibles']['blog'] = $this->blog_model->get($blog_id);

		$data['_varibles']['SEO_title'] = $data['_varibles']['blog']['blog_seo_title'];
		$data['_varibles']['SEO_keywords'] = $data['_varibles']['blog']['blog_seo_keyword'];
		$data['_varibles']['SEO_description'] = $data['_varibles']['blog']['blog_seo_description'];

		$data['_varibles']['blogcategorys'] = $this->blogcategory_model->get_all();

		$data['_varibles']['blogs'] = $this->blog_model->get_all();
		$data['_varibles']['popularblogs'] = $this->blog_model->get_all_popular();
		$data['_varibles']['categorys'] = $this->categorys_model->get_all();
		$data['_content'] = 'site/blog_detail';
		$this->load->view('layouts/site',$data);
	}
}
