<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogcategory_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function get_all()
	{
		$result = $this->db->get('blogcategory');
		return $result->result_array();
	}
	public function insert($blogcat_name,$blogcat_seo_title,$blogcat_seo_description,$blogcat_seo_keyword,$blogcat_parent_id,$blogcat_description,$blogcat_image)
	{
		$data = array(
			'blogcat_name' => $blogcat_name,
			'blogcat_image'=> $blogcat_image,
			'blogcat_description'=>$blogcat_description,
			'blogcat_seo_title'=>$blogcat_seo_title,
			'blogcat_seo_keyword'=>$blogcat_seo_keyword,
			'blogcat_seo_description'=>$blogcat_seo_description,
			'blogcat_parent_id'=>$blogcat_parent_id
			);
		if($this->db->insert('blogcategory',$data)) return TRUE;
		return FALSE;
	}
	public function update($blogcat_id,$blogcat_name,$blogcat_seo_title,$blogcat_seo_description,$blogcat_seo_keyword,$blogcat_parent_id,$blogcat_description,$blogcat_image)
	{
		$data = array(
			'blogcat_name' => $blogcat_name,
			'blogcat_description'=>$blogcat_description,
			'blogcat_seo_title'=>$blogcat_seo_title,
			'blogcat_seo_keyword'=>$blogcat_seo_keyword,
			'blogcat_seo_description'=>$blogcat_seo_description,
			'blogcat_parent_id'=>$blogcat_parent_id
			);
		if($blogcat_image != '') $data['blogcat_image'] = $blogcat_image;
		$this->db->where('blogcat_id',$blogcat_id);
		if($this->db->update('blogcategory',$data)) return TRUE;
		return FALSE;
	}
	public function get($blogcat_id)
	{
		$this->db->where('blogcat_id',$blogcat_id);
		$result = $this->db->get('blogcategory');
		$result = $result->result_array();
		if(count($result) == 1) return $result[0];
		return FALSE;
	}
	public function delete($blogcat_id)
	{
		if(is_array($blogcat_id))
		{
			$this->db->where('blogcat_id',$blogcat_id[0]);
			for($i = 1; $i < count($blogcat_id); $i++)
			{
				$this->db->or_where('blogcat_id',$blogcat_id[$i]);
			}
			if($this->db->delete('blogcategory')) return TRUE;
			return FALSE;
		}
		else
		{
			$this->db->where('blogcat_id',$blogcat_id);
			if($this->db->delete('blogcategory')) return TRUE;
			return FALSE;
		}
		return FALSE;
	}
}