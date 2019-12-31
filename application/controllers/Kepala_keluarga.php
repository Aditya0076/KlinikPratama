<?php 
/**
 * 
 */
class Kepala_keluarga extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Kepala_keluargaModel', 'Model');
	}

	public function index()
	{
		$this->load->view('kepala_keluarga/read');
	}
}