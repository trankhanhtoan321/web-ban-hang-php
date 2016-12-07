<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function insert($user_name,$user_pass,$user_email=NULL)
	{
		$data = array(
			'user_name' => $user_name,
			'user_pass' => $user_pass
			);
		if($user_email!=NULL) $data['user_email']=$user_email;
		if($this->db->insert('users',$data))
			return TRUE;
		return FALSE;
	}
}