<?php 
/**
 * 
 */
class Pasien extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('PasienModel','model');
	}

	public function index()
	{
		$data['pasien'] = $this->model->getAll();
		$this->load->view('pasien/read',$data);
	}

	public function create()
	{
		$data['kepala_keluarga'] = $this->model->getKepala_keluarga();
		$this->load->view('pasien/create',$data);
	}

	public function insert()
	{
		$kode_pasien = $this->input->post('kode_pasien');
		$kode_keluarga = $this->input->post('kode_keluarga');
		$nama_pasien = $this->input->post('nama_pasien');
		$umur = $this->input->post('umur');
		$jenis_kelamin = $this->input->post('jenis_kelamin');

		$pasien = array(
			'kode_pasien' => $kode_pasien,
			'kode_keluarga' => $kode_keluarga,
			'nama_pasien' => $nama_pasien,
			'umur' => $umur,
			'jenis_kelamin' => $jenis_kelamin
		);

		$this->model->insert($pasien);
		redirect('pasien');
	}
}