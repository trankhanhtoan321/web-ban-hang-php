<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('setting_model');
		$this->load->model('categorys_model');
		$this->load->model('products_model');
	}
	public function index()
	{
		$data['_varibles']['SEO_title'] = $this->setting_model->get('set_pagetitle');
		$data['_varibles']['SEO_keywords'] = $this->setting_model->get('set_pagekeyword');
		$data['_varibles']['SEO_description'] = $this->setting_model->get('set_pagedescriptiton');
		$data['_varibles']['categorys'] = $this->categorys_model->get_all();
		$data['_varibles']['products'] = $this->products_model->get_all();
		$data['_content'] = 'site/home';
		$this->load->view('layouts/site',$data);
	}
}
