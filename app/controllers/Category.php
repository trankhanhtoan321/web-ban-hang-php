<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('setting_model');
		$this->load->model('categorys_model');
		$this->load->model('products_model');
	}
	public function index($cat_id=0)
	{
		if($cat_id==0) redirect('/','refresh');
		$data['_varibles']['category'] = $this->categorys_model->get($cat_id);

		$data['_varibles']['SEO_title'] = $data['_varibles']['category']['cat_seo_title'];
		$data['_varibles']['SEO_keywords'] = $data['_varibles']['category']['cat_seo_keyword'];
		$data['_varibles']['SEO_description'] = $data['_varibles']['category']['cat_seo_description'];

		$data['_varibles']['categorys'] = $this->categorys_model->get_all();
		$data['_varibles']['products'] = $this->products_model->get_all();
		$data['_content'] = 'site/category';
		$this->load->view('layouts/site',$data);
	}
}
