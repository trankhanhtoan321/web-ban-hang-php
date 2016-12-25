<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('setting_model');
		$this->load->model('categorys_model');
		$this->load->model('products_model');
		$this->load->model('customer_model');
		$this->load->model('orders_model');
		$this->load->model('orderdt_model');
	}
	public function index()
	{
		if($this->input->post('ordered'))
		{
			$customer_name = $this->input->post('customer_name',TRUE);
			$customer_tel = $this->input->post('customer_tel',TRUE);
			$customer_email = $this->input->post('customer_email',TRUE);
			$customer_address = $this->input->post('customer_address',TRUE);
			$customer_note = $this->input->post('customer_note',TRUE);
			if($order_customer_id = $this->customer_model->insert($customer_name,$customer_tel,$customer_email,$customer_address,$customer_note))
			{
				$order_time = time();
				$order_value = $this->cart->total();
				if($orderdt_orders_id = $this->orders_model->insert($order_customer_id,$order_time,$order_value))
				{
					foreach($this->cart->contents() as $item)
					{
						$orderdt_pro_id = $item['id'];
						$orderdt_qty = $item['qty'];
						$orderdt_price = $item['price'];
						$this->orderdt_model->insert($orderdt_pro_id,$orderdt_qty,$orderdt_price,$orderdt_orders_id);
						$this->products_model->increase($orderdt_pro_id,'pro_buys');
					}
					$this->cart->destroy();
					redirect('/order/success','refresh');
				}
			}
		}
		$data['_varibles']['SEO_title'] = $this->setting_model->get('set_pagetitle');
		$data['_varibles']['SEO_keywords'] = $this->setting_model->get('set_pagekeyword');
		$data['_varibles']['SEO_description'] = $this->setting_model->get('set_pagedescriptiton');

		$data['_varibles']['categorys'] = $this->categorys_model->get_all();
		
		$data['_content'] = 'site/checkout';
		$this->load->view('layouts/site',$data);
	}
	public function success()
	{
		$data['_varibles']['SEO_title'] = $this->setting_model->get('set_pagetitle');
		$data['_varibles']['SEO_keywords'] = $this->setting_model->get('set_pagekeyword');
		$data['_varibles']['SEO_description'] = $this->setting_model->get('set_pagedescriptiton');

		$data['_varibles']['categorys'] = $this->categorys_model->get_all();
		
		$data['_content'] = 'site/checkoutsuccess';
		$this->load->view('layouts/site',$data);
	}
}