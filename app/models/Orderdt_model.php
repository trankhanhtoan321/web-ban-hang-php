<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orderdt_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function insert($orderdt_pro_id,$orderdt_qty,$orderdt_price,$orderdt_orders_id)
	{
		$data =array(
			'orderdt_pro_id'=>$orderdt_pro_id,
			'orderdt_qty'=>$orderdt_qty,
			'orderdt_price'=>$orderdt_price,
			'orderdt_order_id'=>$orderdt_orders_id
			);
		if($this->db->insert('orderdt',$data)) return TRUE;
		return FALSE;
	}
}