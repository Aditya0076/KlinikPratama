<?php 
/**
 * 
 */
class Dusun extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('DusunModel', 'model');
	}

	public function index()
	{
		$data['dusun'] = $this->model->getAll();
		$this->load->view('dusun/read',$data);
	}

	public function create()
	{
		$this->load->view('dusun/create');
	}

	public function insert()
	{
		$nama_dusun = $this->input->post('nama_dusun');
		$kode_desa = $this->input->post('kode_desa');

		$dusun = array(
			'nama_dusun' => $nama_dusun,
			'kode_desa' => $kode_desa
		);

		$this->model->insert($dusun);

		redirect('dusun');
	}
}
