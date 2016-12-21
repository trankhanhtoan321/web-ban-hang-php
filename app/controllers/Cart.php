<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('setting_model');
		$this->load->model('categorys_model');
		$this->load->model('products_model');
	}
	public function index()
	{
		if($this->input->post('update_cart'))
		{
			$data_temp = array();
			foreach($this->cart->contents() as $item)
			{
				$temp = array(
					'rowid' => $item['rowid'],
					'qty'   => $this->input->post('item_'.$item['rowid'],TRUE)
					);
				$data_temp[] = $temp;
			}
			if($this->cart->update($data_temp)) $data['_alert'] = 'alert/success';
			else $data['_alert'] = 'alert/error';
		}
		$data['_varibles']['SEO_title'] = $this->setting_model->get('set_pagetitle');
		$data['_varibles']['SEO_keywords'] = $this->setting_model->get('set_pagekeyword');
		$data['_varibles']['SEO_description'] = $this->setting_model->get('set_pagedescriptiton');

		$data['_varibles']['categorys'] = $this->categorys_model->get_all();
		
		$data['_content'] = 'site/cart';
		$this->load->view('layouts/site',$data);
	}
	public function addcart($pro_id=0)
	{
		if($pro_id==0) redirect('/','refresh');
		$carts = $this->cart->contents();
		$kt=0;
		foreach($carts as $cart)
		{
			if($cart['id']==$pro_id)
			{
				$data = array(
					'rowid'=>$cart['rowid'],
					'qty'=>($cart['qty']+1)
					);
				$this->cart->update($data);
				$kt=1;
				break;
			}
		}
		if($kt==0)
		{
			$product = $this->products_model->get($pro_id);
			$data = array(
				'id'=>$product['pro_id'],
	        	'qty'     => 1,
	        	'price'   => ($product['pro_price_sale']!=0?$product['pro_price_sale']:$product['pro_price']),
	        	'name'    => $product['pro_name'],
	        	'sku'	=> $product['pro_sku'],
	        	'image' => $product['pro_image']
				);
			$this->cart->insert($data);
		}
		redirect('/cart','refresh');
	}
	public function delete($rowid=0)
	{
		if($rowid==0) redirect('/','refresh');
		$this->cart->remove($rowid);
		redirect('/cart','refresh');
	}
}
