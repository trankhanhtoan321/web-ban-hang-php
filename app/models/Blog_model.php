<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function insert($blog_user_id,$blog_time,$blog_name,$blog_seo_title,$blog_seo_description,$blog_seo_keyword,$blog_cat_ids,$blog_content,$blog_image)
	{
		$data =array(
			'blog_user_id'=>$blog_user_id,
			'blog_time'=>$blog_time,
			'blog_name'=>$blog_name,
			'blog_seo_title'=>$blog_seo_title,
			'blog_seo_description'=>$blog_seo_description,
			'blog_seo_keyword'=>$blog_seo_keyword,
			'blog_cat_ids'=>$blog_cat_ids,
			'blog_content'=>$blog_content,
			'blog_image'=>$blog_image
			);
		if($this->db->insert('blogs',$data)) return TRUE;
		return FALSE;
	}
	public function get_all()
	{
		$result = $this->db->get('blogs');
		return $result->result_array();
	}
	public function update($blog_id,$blog_time,$blog_name,$blog_seo_title,$blog_seo_description,$blog_seo_keyword,$blog_cat_ids,$blog_content,$blog_image)
	{
		$data =array(
			'blog_time'=>$blog_time,
			'blog_name'=>$blog_name,
			'blog_seo_title'=>$blog_seo_title,
			'blog_seo_description'=>$blog_seo_description,
			'blog_seo_keyword'=>$blog_seo_keyword,
			'blog_cat_ids'=>$blog_cat_ids,
			'blog_content'=>$blog_content
			);
		if($blog_image!='') $data['blog_image']=$blog_image;
		$this->db->where('blog_id',$blog_id);
		if($this->db->update('blogs',$data)) return TRUE;
		return FALSE;
	}
	public function get($blog_id)
	{
		$this->db->where('blog_id',$blog_id);
		$result = $this->db->get('blogs');
		$result = $result->result_array();
		if(count($result) == 1) return $result[0];
		return FALSE;
	}
	public function delete($blog_id)
	{
		if(is_array($blog_id))
		{
			$this->db->where('blog_id',$blog_id[0]);
			for($i = 1; $i < count($blog_id); $i++)
			{
				$this->db->or_where('blog_id',$blog_id[$i]);
			}
			if($this->db->delete('blogs')) return TRUE;
			return FALSE;
		}
		else
		{
			$this->db->where('blog_id',$blog_id);
			if($this->db->delete('blogs')) return TRUE;
			return FALSE;
		}
		return FALSE;
	}
}