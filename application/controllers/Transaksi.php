<?php 
/**
 * 
 */
class Transaksi extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('TransaksiModel', 'model');
	}

	public function index()
	{
		$data['transaksi'] = $this->model->getAll();
		$this->load->view('transaksi/read',$data);
	}

	public function crete()
	{
		$this->load->view('transaksi/create');
	}

	public function insert()
	{
		
	}
}