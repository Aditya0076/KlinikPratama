<?php
class Desa extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('DesaModel', 'Model');
	}

	public function index()
	{
		$this->load->view('desa/read');
	}
}