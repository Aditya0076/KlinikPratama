<?php 
/**
 * 
 */
class Pasien extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('PasienModel','Model');
	}

	public function index()
	{
		$this->load->view('pasien/read');
	}
}