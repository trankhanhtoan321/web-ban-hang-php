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
		echo strip_tags("<a>sdlfjdklf<br/><h1>111</a>");
	}
}