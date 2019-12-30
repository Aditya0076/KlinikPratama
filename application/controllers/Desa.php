<?php
class ClassName extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('DesaModel', 'Model');
	}

	public function create()
	{
		$this->load->view('')
	}
}