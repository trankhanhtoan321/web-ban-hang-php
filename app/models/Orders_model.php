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
	public function get_all_detail()
	{
		$this->db->from('orders');
		$this->db->join('customer','customer.customer_id=orders.order_customer_id');
		$result = $this->db->get();
		return $result->result_array();
	}
	public function delete($order_id)
	{
		if(is_array($order_id))
		{
			$this->db->where('order_id',$order_id[0]);
			for($i = 1; $i < count($order_id); $i++)
			{
				$this->db->or_where('order_id',$order_id[$i]);
			}
			if($this->db->delete('orders')) return TRUE;
			return FALSE;
		}
		else
		{
			$this->db->where('order_id',$order_id);
			if($this->db->delete('orders')) return TRUE;
			return FALSE;
		}
		return FALSE;
	}
	public function done($order_id)
	{
		$data = array('order_success' => 1);
		$this->db->where('order_id',$order_id[0]);
		for($i = 1; $i < count($order_id); $i++)
		{
			$this->db->or_where('order_id',$order_id[$i]);
		}
		if($this->db->update('orders',$data)) return TRUE;
		return FALSE;
	}
	public function waitting($order_id)
	{
		$data = array('order_success' => 0);
		$this->db->where('order_id',$order_id[0]);
		for($i = 1; $i < count($order_id); $i++)
		{
			$this->db->or_where('order_id',$order_id[$i]);
		}
		if($this->db->update('orders',$data)) return TRUE;
		return FALSE;
	}
	public function get($order_id)
	{
		$this->db->from('orders');
		$this->db->where('order_id',$order_id);
		$this->db->join('orderdt','orders.order_id=orderdt.orderdt_order_id');
		$this->db->join('products','products.pro_id=orderdt.orderdt_pro_id');
		$this->db->join('customer','orders.order_customer_id=customer.customer_id');
		$result = $this->db->get();
		return $result->result_array();
	}
}