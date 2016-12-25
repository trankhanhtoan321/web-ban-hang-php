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
		$this->db->order_by('blog_time','DESC');
		$result = $this->db->get('blogs');
		return $result->result_array();
	}
	public function get_all_popular()
	{
		$this->db->order_by('blog_views','DESC');
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
	public function get_all_list($blogcat_id)
	{
		$this->db->order_by('blog_time','DESC');
		$result = $this->db->get('blogs');
		$result = $result->result_array();
		$data=array();
		if(count($result)>0)
		{
			foreach($result as $temp)
			{
				$t = json_decode($temp['blog_cat_ids']);
				if(is_array($t) && in_array($blogcat_id, $t))
				{
					$data[]=$temp;
				}
			}
		}
		return $data;
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
	public function increase_views($blog_id)
	{
		$this->db->select('blog_views');
		$this->db->where('blog_id',$blog_id);
		$this->db->from('blogs');
		$result = $this->db->get()->result_array();
		if(count($result)==1)
		{
			$data = array('blog_views'=>$result[0]['blog_views']+1);
			$this->db->where('blog_id',$blog_id);
			if($this->db->update('blogs',$data)) return TRUE;
			return FALSE;
		}
		return FALSE;
	}
}