<?php 
/**
 * 
 */
class Obat extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('ObatModel', 'model');
	}

	public function index()
	{
		$data['obat'] = $this->model->getAll();
		$this->load->view('obat/read',$data);
	}

	public function create()
	{
		$this->load->view('obat/create');
	}

	public function insert()
	{
		$nama_obat = $this->input->post('nama_obat');
		$jenis_obat = $this->input->post('jenis_obat');
		$harga_obat = $this->input->post('harga_obat');

		$obat = array(
			'nama_obat' => $nama_obat,
			'jenis_obat' => $jenis_obat,
			'harga_obat' => $harga_obat
		);

		$this->model->insert($obat);
		redirect('obat');
	}
}