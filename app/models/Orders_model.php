<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function insert($order_customer_id,$order_time,$order_value)
	{
		$data =array(
			'order_customer_id'=>$order_customer_id,
			'order_time'=>$order_time,
			'order_value'=>$order_value
			);
		if($this->db->insert('orders',$data))
		{
			$this->db->select('order_id');
			$this->db->from('orders');
			$this->db->where('order_time',$order_time);
			$result = $this->db->get()->result_array();
			return $result[0]['order_id'];
		}
		return 0;
	}
}