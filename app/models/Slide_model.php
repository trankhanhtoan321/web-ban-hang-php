<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slide_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function insert($slide_link,$slide_image)
	{
		$data = array(
			'slide_link'=>$slide_link,
			'slide_image'=>$slide_image
			);
		if($this->db->insert('slide',$data)) return TRUE;
		return FALSE;
	}
	public function update($slide_id,$slide_link,$slide_image)
	{
		$data = array('slide_link'=>$slide_link);
		if($slide_image!='') $data['slide_image']=$slide_image;
		$this->db->where('slide_id',$slide_id);
		if($this->db->update('slide',$data)) return TRUE;
		return FALSE;
	}
	public function get_all()
	{
		$result = $this->db->get('slide');
		return $result->result_array();
	}
	public function delete($slide_id)
	{
		if(is_array($slide_id))
		{
			$this->db->where('slide_id',$slide_id[0]);
			for($i = 1; $i < count($slide_id); $i++)
			{
				$this->db->or_where('slide_id',$slide_id[$i]);
			}
			if($this->db->delete('slide')) return TRUE;
			return FALSE;
		}
		else
		{
			$this->db->where('slide_id',$slide_id);
			if($this->db->delete('slide')) return TRUE;
			return FALSE;
		}
		return FALSE;
	}
	public function get($slide_id)
	{
		$this->db->where('slide_id',$slide_id);
		$result = $this->db->get('slide');
		$result = $result->result_array();
		if(count($result) == 1) return $result[0];
		return FALSE;
	}
}