<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogcategory extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('setting_model');
		$this->load->model('categorys_model');
		$this->load->model('blog_model');
		$this->load->model('blogcategory_model');
	}
	public function index($blogcat_id=0)
	{
		if($blogcat_id==0) redirect('/','refresh');
		$data['_varibles']['blogcategory'] = $this->blogcategory_model->get($blogcat_id);

		$data['_varibles']['SEO_title'] = $data['_varibles']['blogcategory']['blogcat_seo_title'];
		$data['_varibles']['SEO_keywords'] = $data['_varibles']['blogcategory']['blogcat_seo_keyword'];
		$data['_varibles']['SEO_description'] = $data['_varibles']['blogcategory']['blogcat_seo_description'];

		$data['_varibles']['categorys'] = $this->categorys_model->get_all();
		$data['_varibles']['blogcategorys'] = $this->blogcategory_model->get_all();
		$data['_varibles']['blogs'] = $this->blog_model->get_all_list($blogcat_id);
		$data['_varibles']['popularblogs'] = $this->blog_model->get_all_popular();
		$data['_content'] = 'site/blogcategory';
		$this->load->view('layouts/site',$data);
	}
}
