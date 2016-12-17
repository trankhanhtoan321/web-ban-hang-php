<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function insert($pro_sku,$pro_name,$pro_description,$pro_shortdescripttion,$pro_seo_title,$pro_seo_description,$pro_seo_keyword,$pro_price,$pro_price_sale,$pro_price_sale_date_begin,$pro_price_sale_date_finish,$pro_image,$pro_cat_ids)
	{
		$data = array(
			'pro_name' 					=> $pro_name,
			'pro_sku' 					=> $pro_sku,
			'pro_description' 			=> $pro_description,
			'pro_shortdescripttion' 	=> $pro_shortdescripttion,
			'pro_seo_title'				=> $pro_seo_title,
			'pro_seo_description'		=> $pro_seo_description,
			'pro_seo_keyword'			=> $pro_seo_keyword,
			'pro_price'					=> $pro_price,
			'pro_price_sale'			=> $pro_price_sale,
			'pro_price_sale_date_begin' => $pro_price_sale_date_begin,
			'pro_price_sale_date_finish'=> $pro_price_sale_date_finish,
			'pro_image'					=> $pro_image,
			'pro_cat_ids'				=> $pro_cat_ids
			);
		if($this->db->insert('products',$data)) return TRUE;
		return FALSE;
	}
	public function update($pro_id,$pro_sku,$pro_name,$pro_description,$pro_shortdescripttion,$pro_seo_title,$pro_seo_description,$pro_seo_keyword,$pro_price,$pro_price_sale,$pro_price_sale_date_begin,$pro_price_sale_date_finish,$pro_image,$pro_cat_ids)
	{
		$data = array(
			'pro_sku' 					=> $pro_sku,
			'pro_name' 					=> $pro_name,
			'pro_description' 			=> $pro_description,
			'pro_shortdescripttion' 	=> $pro_shortdescripttion,
			'pro_seo_title'				=> $pro_seo_title,
			'pro_seo_description'		=> $pro_seo_description,
			'pro_seo_keyword'			=> $pro_seo_keyword,
			'pro_price'					=> $pro_price,
			'pro_price_sale'			=> $pro_price_sale,
			'pro_price_sale_date_begin' => $pro_price_sale_date_begin,
			'pro_price_sale_date_finish'=> $pro_price_sale_date_finish,
			'pro_cat_ids'				=> $pro_cat_ids
			);
		if($pro_image!='') $data['pro_image']=$pro_image;
		$this->db->where('pro_id',$pro_id);
		if($this->db->update('products',$data)) return TRUE;
		return FALSE;
	}
	public function get_all()
	{
		$result = $this->db->get('products');
		return $result->result_array();
	}
	public function get($pro_id)
	{
		$this->db->where('pro_id',$pro_id);
		$result = $this->db->get('products');
		$result = $result->result_array();
		if(count($result) == 1) return $result[0];
		return FALSE;
	}
	public function delete($pro_id)
	{
		if(is_array($pro_id))
		{
			$this->db->where('pro_id',$pro_id[0]);
			for($i = 1; $i < count($pro_id); $i++)
			{
				$this->db->or_where('pro_id',$pro_id[$i]);
			}
			if($this->db->delete('products')) return TRUE;
			return FALSE;
		}
		else
		{
			$this->db->where('pro_id',$pro_id);
			if($this->db->delete('products')) return TRUE;
			return FALSE;
		}
		return FALSE;
	}
}