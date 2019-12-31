<?php 
/**
 * 
 */
class RekamMedis extends CI_Controller
{
	
	function __construct
	{
		parent::__construct();
		$this->load->model('Rekam_medisModel', 'Model');
	}

	public function index()
	{
		$this->load->view('rekam_medis/read');
	}
}