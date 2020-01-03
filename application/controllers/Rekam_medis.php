<?php 
/**
 * 
 */
class Rekam_medis extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Rekam_medisModel', 'model');
	}

	public function index()
	{
		$data['rekam_medis'] = $this->model->getAll();
		$this->load->view('rekam_medis/read',$data);
	}

	public function create()
	{
		$this->load->view('rekam_medis/create');
	}

	public function insert()
	{
		$kode_pasien = $this->input->post('kode_pasien');
		$id_obat = $this->input->post('id_obat');
		$waktu = $this->input->post('waktu');
		$ciri = $this->input->post('ciri');
		$diagnosa = $this->input->post('diagnosa');

		$rekam_medis = array(
			'kode_pasien' => $kode_pasien,
			'id_obat' => $id_obat,
			'waktu' => $waktu,
			'ciri' => $ciri,
			'diagnosa' => $diagnosa
		);

		$this->model->insert($rekam_medis);
		redirect('rekam_medis');
	}
}
