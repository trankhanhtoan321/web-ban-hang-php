<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('password_generate');
	}
	public function insert($user_name,$user_pass,$user_email=NULL)
	{
		// check user name exist
		if(self::user_name_exists($user_name)) 
			return FALSE;
		// insert into datbase
		$data = array(
			'user_name' => $user_name,
			'user_pass' => $this->password_generate->encode($user_pass)
			);
		if($user_email!=NULL) $data['user_email']=$user_email;
		if($this->db->insert('users',$data))
			return TRUE;
		return FALSE;
	}
	public function verify($user_name,$user_pass)
	{
		$this->db->from('users');
		$this->db->where('user_name',$user_name);
		$this->db->where('user_pass',$this->password_generate->encode($user_pass));
		$num = $this->db->count_all_results();
		if($num == 1)
		{
			$this->db->reset_query();
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('user_name',$user_name);
			$this->db->where('user_pass',$this->password_generate->encode($user_pass));
			$results = $this->db->get()->result_array();
			return $results[0];
		}
		return FALSE;
	}
	private function user_name_exists($user_name)
	{
		$this->db->from('users');
		$this->db->where('user_name',$user_name);
		$num = $this->db->count_all_results();
		if($num > 0) return TRUE;
		return FALSE;
	}
	public function update_user_lastlogin($user_id)
	{
		$data = array(
			'user_lastlogin' => time()
			);
		$this->db->where('user_id',$user_id);
		if($this->db->update('users',$data))
			return TRUE;
		return FALSE;
	}
	public function update_profile($user_id,$user_fullname,$user_name,$user_email,$user_image)
	{
		$data = array(
			'user_name' => $user_name,
			'user_fullname' => $user_fullname,
			'user_email' => $user_email
			);
		if($user_image != '') $data['user_image'] = $user_image;
		$this->db->where('user_id',$user_id);
		if($this->db->update('users',$data))
			return TRUE;
		return FALSE;
	}
	public function get_info($user_id)
	{
		$this->db->from('users');
		$this->db->where('user_id',$user_id);
		if($this->db->count_all_results() == 1)
		{
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('user_id',$user_id);
			$results = $this->db->get()->result_array();
			return $results[0];
		}
		return FALSE;
	}
	public function change_password($user_id,$old_pass,$new_pass)
	{
		$data = self::get_info($user_id);
		if(!$data) return FALSE;
		if($this->password_generate->encode($old_pass) == $data['user_pass'])
		{
			$data = array(
				'user_pass' => $this->password_generate->encode($new_pass)
				);
			$this->db->where('user_id',$user_id);
			if($this->db->update('users',$data)) return TRUE;
			return FALSE;
		}
		return FALSE;
	}
}