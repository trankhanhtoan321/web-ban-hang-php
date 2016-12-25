<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model
{
	private $tkt_table_name = 'products';
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
	public function search($key,$field='',$order='ASC',$limit=0,$offset=0)
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
	public function increase($key,$field)
	{
		if(!in_array($field, $this->tkt_fields)) return FALSE;
		$this->db->select($field);
		$this->db->where($this->tkt_primary_field,$key);
		$this->db->from($this->tkt_table_name);
		$result = $this->db->get();
		$result = $result->result_array();
		if(count($result)!=1) return FALSE;
		$num = $result[0][$field]+1;
		$data = array();
		$data[$this->tkt_primary_field]=$key;
		$data[$field]=$num;
		if($this->tkt_update($data)) return TRUE;
		return FALSE;
	}
	/*$data = array()*/
	public function tkt_insert($data)
	{
		$data1 = array();
		foreach($this->tkt_fields as $field)
		{
			if($field!=$this->tkt_primary_field && isset($data[$field]))
			{
				$data1[$field] = $data[$field];
			}
		}
		if($this->db->insert($this->tkt_table_name,$data1)) return TRUE;
		return FALSE;
	}
	/*
	$data = array(), need include primary field
	return TRUE,FALSE
	*/
	public function tkt_update($data)
	{
		if(!isset($data[$this->tkt_primary_field])) return FALSE;
		$data1 = array();
		foreach($this->tkt_fields as $field)
		{
			if($field!=$this->tkt_primary_field && isset($data[$field]))
			{
				$data1[$field] = $data[$field];
			}
		}
		$this->db->where($this->tkt_primary_field,$data[$this->tkt_primary_field]);
		if($this->db->update($this->tkt_table_name,$data1)) return TRUE;
		return FALSE;
	}
}