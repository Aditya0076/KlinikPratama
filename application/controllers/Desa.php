<?php
class Desa extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('DesaModel', 'model');
	}

	public function index()
	{
		$data['desa'] = $this->Model->getAll();
		$this->load->view('desa/read',$data);
	}

	public function create()
	{
		$this->load->view('desa/create');
	}

	public function insert()
	{
		$nama_desa = $this->input->post('nama_desa');

		$desa = array('nama_desa' => $nama_desa);

		$this->model->insert($desa);

		redirect('desa');
	}
}