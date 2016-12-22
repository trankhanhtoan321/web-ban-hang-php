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
	public function get_all()
	{
		$result = $this->db->get('slide');
		return $result->result_array();
	}
}