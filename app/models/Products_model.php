<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function insert($pro_name,$pro_description,$pro_shortdescripttion,$pro_seo_title,$pro_seo_description,$pro_seo_keyword,$pro_price,$pro_price_sale,$pro_price_sale_date_begin,$pro_price_sale_date_finish,$pro_image,$pro_cat_ids)
	{
		$data = array(
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
			'pro_image'					=> $pro_image,
			'pro_cat_ids'				=> $pro_cat_ids
			);
		if($this->db->insert('products',$data)) return TRUE;
		return FALSE;
	}
}