<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('toan_model');
	}
	public function index()
	{
		echo '<pre>';
		print_r($this->toan_model->search('Maecenas consequat mauris',NULL,"DESC"));
		echo '</pre>';
	}
}