<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('setting_model');
		$this->load->model('categorys_model');
		$this->load->model('products_model');
	}
	public function index($pro_id=0)
	{
		if($pro_id==0) redirect('/','refresh');
		$this->products_model->increase($pro_id,'pro_views');
		$data['_varibles']['product'] = $this->products_model->get($pro_id);

		$data['_varibles']['SEO_title'] = $data['_varibles']['product']['pro_seo_title'];
		$data['_varibles']['SEO_keywords'] = $data['_varibles']['product']['pro_seo_keyword'];
		$data['_varibles']['SEO_description'] = $data['_varibles']['product']['pro_seo_description'];

		$data['_varibles']['categorys'] = $this->categorys_model->get_all();
		$data['_varibles']['products'] = $this->products_model->get_all();
		$data['_content'] = 'site/product';
		$this->load->view('layouts/site',$data);
	}
}
