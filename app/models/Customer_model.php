<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function checkcustomerexist($customer_name,$customer_tel,$customer_email)
	{
		$this->db->where('customer_name',$customer_name);
		$this->db->where('customer_tel',$customer_tel);
		$this->db->where('customer_email',$customer_email);
		$this->db->from('customer');
		$result=$this->db->get();
		$result = $result->result_array();
		if(count($result)==1) return TRUE;
		return FALSE;
	}
	public function insert($customer_name,$customer_tel,$customer_email,$customer_address,$customer_note)
	{
		if(!$this->checkcustomerexist($customer_name,$customer_tel,$customer_email))
		{
			$data =array(
				'customer_name'=>$customer_name,
				'customer_tel'=>$customer_tel,
				'customer_email'=>$customer_email,
				'customer_address'=>$customer_address,
				'customer_note'=>$customer_note
				);
			if($this->db->insert('customer',$data))
			{
				$this->db->where('customer_name',$customer_name);
				$this->db->where('customer_tel',$customer_tel);
				$this->db->where('customer_email',$customer_email);
				$this->db->from('customer');
				$result=$this->db->get();
				$result = $result->result_array();
				return $result[0]['customer_id'];
			}
			return 0;
		}
		else
		{
			$this->db->where('customer_name',$customer_name);
			$this->db->where('customer_tel',$customer_tel);
			$this->db->where('customer_email',$customer_email);
			$this->db->from('customer');
			$result=$this->db->get();
			$result = $result->result_array();
			return $result[0]['customer_id'];
		}
	}
}