<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorys_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function get_all()
	{
		$result = $this->db->get('categorys');
		return $result->result_array();
	}
	public function get($cat_id)
	{
		$this->db->where('cat_id',$cat_id);
		$result = $this->db->get('categorys');
		$result = $result->result_array();
		if(count($result) == 1) return $result[0];
		return FALSE;
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
	public function delete($cat_id)
	{
		if(is_array($cat_id))
		{
			$this->db->where('cat_id',$cat_id[0]);
			for($i = 1; $i < count($cat_id); $i++)
			{
				$this->db->or_where('cat_id',$cat_id[$i]);
			}
			if($this->db->delete('categorys')) return TRUE;
			return FALSE;
		}
		else
		{
			$this->db->where('cat_id',$cat_id);
			if($this->db->delete('categorys')) return TRUE;
			return FALSE;
		}
		return FALSE;
	}
}