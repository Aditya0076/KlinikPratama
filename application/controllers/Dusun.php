<?php 
/**
 * 
 */
class Dusun extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('DusunModel', 'Model');
	}

	public function index()
	{
		$this->load->view('dusun/read');
	}
}