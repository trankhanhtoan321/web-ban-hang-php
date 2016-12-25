<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model
{
	private $data=array();
	public function __construct()
	{
		parent::__construct();
		$this->db->select('*');
		$temp=$this->db->get('setting');
		$temp=$temp->result_array();
		foreach($temp as $t)
			$this->data[$t['set_name']]=$t['set_value'];
	}
	private function update_data()
	{
		$this->db->select('*');
		$temp=$this->db->get('setting');
		$temp=$temp->result_array();
		foreach($temp as $t)
			$this->data[$t['set_name']]=$t['set_value'];
	}
	public function get($name)
	{
		if(isset($this->data[$name])) return $this->data[$name];
		return '';
	}
	public function get_all()
	{
		return $this->data;
	}
	public function update($set_pagetitle,$set_pagedescriptiton,$set_pagekeyword,$logo,$author,$address,$phone,$email)
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

		$data=array('set_value'=>$author);
		$this->db->where('set_name','author');
		if(!$this->db->update('setting',$data)) return FALSE;

		$data=array('set_value'=>$address);
		$this->db->where('set_name','address');
		if(!$this->db->update('setting',$data)) return FALSE;

		$data=array('set_value'=>$phone);
		$this->db->where('set_name','phone');
		if(!$this->db->update('setting',$data)) return FALSE;

		$data=array('set_value'=>$email);
		$this->db->where('set_name','email');
		if(!$this->db->update('setting',$data)) return FALSE;

		if($logo!='')
		{
			$data=array('set_value'=>$logo);
			$this->db->where('set_name','logo');
			if(!$this->db->update('setting',$data)) return FALSE;
		}

		self::update_data();
		return TRUE;
	}
}