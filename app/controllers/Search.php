<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
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
		$data['_varibles']['products'] = array();
		if($this->input->post('keyword',TRUE)!='')
		{
			$data['_varibles']['SEO_title'] = $this->input->post('keyword',TRUE);
			$data['_varibles']['products'] = $this->products_model->search($this->input->post('keyword',TRUE));
			if($this->input->post('category',TRUE)!=0)
			{
				$data_temp = array();
				foreach($data['_varibles']['products'] as $temp)
				{
					$t=json_decode($temp['pro_cat_ids']);
					if(is_array($t) && in_array($this->input->post('category',TRUE), $t))
						$data_temp[]=$temp;
				}
				$data['_varibles']['products'] = $data_temp;
			}
		}
		$data['_content'] = 'site/search';
		$this->load->view('layouts/site',$data);
	}
}