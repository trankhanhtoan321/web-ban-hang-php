<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model
{
	private $data=array();
	function __construct()
	{
		$this->db->select('*');
		$temp=$this->db->get('setting');
		$temp=$temp->result_array();
		foreach($temp as $t)
			$this->data[$t['set_name']]=$t['set_value'];
	}
	function get($name)
	{
		if(isset($this->data[$name])) return $this->data[$name];
		return 0;
	}
	function get_all()
	{
		return $this->data;
	}
	function update($set_pagetitle,$set_pagedescriptiton,$set_pagekeyword)
	{
		$data=array('set_value'=>$set_pagetitle);
		$this->db->where('set_name','set_pagetitle');
		if(!$this->db->update('setting',$data)) return FALSE;
		
		$data=array('set_value'=>$set_pagedescriptiton);
		$this->db->where('set_name','set_pagedescriptiton');
		if(!$this->db->update('setting',$data)) return FALSE;

		$data=array('set_value'=>$set_pagekeyword);
		$this->db->where('set_name','set_pagekeyword');
		if(!$this->db->update('setting',$data)) return FALSE;

		return TRUE;
	}
}