<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorys_model extends CI_Model
{
	private $tkt_table_name = 'categorys';
	private $tkt_fields;
	private $tkt_primary_field;
	public function __construct()
	{
		parent::__construct();
		$this->tkt_fields = $this->db->list_fields($this->tkt_table_name);
		$temp = $this->db->field_data($this->tkt_table_name);
		foreach ($temp as $temp1)
		{
		    if($temp1->primary_key)
		    {
		    	$this->tkt_primary_field = $temp1->name;
		    	break;
		    }
		}
	}
	/*
	return array
	$order = ASC,DESC
	*/
	public function get_all($order='ASC',$limit=0,$offset=0)
	{
		if($limit!=0)
		{
			if($offset==0) $this->db->limit($limit);
			else $this->db->limit($limit,$offset);
		}
		$this->db->order_by($this->tkt_primary_field,$order);
		$result = $this->db->get($this->tkt_table_name);
		return $result->result_array();
	}
	/*
	return array
	*/
	public function get($key)
	{
		$this->db->where($this->tkt_primary_field,$key);
		$this->db->from($this->tkt_table_name);
		$result = $this->db->get();
		$result = $result->result_array();
		if(count($result)==1) return $result[0];
	}
	/*
	return TRUE,FALSE
	*/
	public function delete($key)
	{
		if(is_array($key))
		{
			$this->db->where($this->tkt_primary_field,$key[0]);
			for($i = 1; $i < count($key); $i++)
			{
				$this->db->or_where($this->tkt_primary_field,$key[$i]);
			}
			if($this->db->delete($this->tkt_table_name)) return TRUE;
			return FALSE;
		}
		else
		{
			$this->db->where($this->tkt_primary_field,$key);
			if($this->db->delete($this->tkt_table_name)) return TRUE;
			return FALSE;
		}
		return FALSE;
	}
	/*
	$key = array
	$order = ASC,DESC
	$field = field to search
	return array
	*/
	public function search($key,$field = '',$order='ASC',$limit=0,$offset=0)
	{
		if($field!='' && in_array($field, $this->fields))
		{
			$this->db->like($field,$key);
			if($limit!=0)
			{
				if($offset==0) $this->db->limit($limit);
				else $this->db->limit($limit,$offset);
			}
			$this->db->order_by($this->tkt_primary_field,$order);
			$this->db->form($this->tkt_table_name);
			$ersult = $this->db->get();
			return $result->array();
		}
		else
		{
			$this->db->from($this->tkt_table_name);
			if($limit!=0)
			{
				if($offset==0) $this->db->limit($limit);
				else $this->db->limit($limit,$offset);
			}
			$this->db->order_by($this->tkt_primary_field,$order);
			$this->db->like($this->tkt_primary_field,$key);
			foreach($this->tkt_fields as $field)
			{
				if($field != $this->tkt_primary_field)
				{
					$this->db->or_like($field,$key);
				}
			}
			$result = $this->db->get();
			return $result->result_array();
		}
	}
	public function count_all()
	{
		return $this->db->count_all($this->tkt_table_name);
	}
	public function insert($cat_name,$cat_seo_title,$cat_seo_description,$cat_seo_keyword,$cat_parent_id,$cat_description,$cat_image)
	{
		$data = array(
			'cat_name' => $cat_name,
			'cat_image' => $cat_image,
			'cat_description' => $cat_description,

			'cat_parent_id' => $cat_parent_id,

			'cat_seo_title' => $cat_seo_title,
			'cat_seo_keyword' => $cat_seo_keyword,
			'cat_seo_description' => $cat_seo_description
			);
		if($this->db->insert('categorys',$data)) return TRUE;
		return FALSE;
	}
	public function update($cat_id,$cat_name,$cat_seo_title,$cat_seo_description,$cat_seo_keyword,$cat_parent_id,$cat_description,$cat_image)
	{
		$data = array(
			'cat_name' => $cat_name,
			'cat_description' => $cat_description,

			'cat_parent_id' => $cat_parent_id,

			'cat_seo_title' => $cat_seo_title,
			'cat_seo_keyword' => $cat_seo_keyword,
			'cat_seo_description' => $cat_seo_description
			);
		if($cat_image != '') $data['cat_image'] = $cat_image;
		$this->db->where('cat_id',$cat_id);
		if($this->db->update('categorys',$data)) return TRUE;
		return FALSE;
	}
}