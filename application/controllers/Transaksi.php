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
		$data['belanja'] = $this->model->getAll();
		$this->load->view('belanja/read',$data);
	}

	public function create()
	{
		$this->load->view('belanja/create');
	}

	public function insert()
	{
		$waktu = $this->input->post('waktu');
		$kode_keluarga = $this->input->post('kode_keluarga');
		$kode_pasien = $this->input->post('kode_pasien');
		$biaya_administrasi = $this->input->post('biaya_administrasi');

		$transaksi = array(
			'waktu' => $waktu,
			'kode_keluarga' => $kode_keluarga,
			'kode_pasien' => $kode_pasien,
			'biaya_administrasi' => $biaya_administrasi
		);

		$this->form_validation->set_rules('waktu','Waktu','required');
		$this->form_validation->set_rules('kode_keluarga','Kode Keluarga','required');
		$this->form_validation->set_rules('kode_pasien','Kode Pasien','required');
		$this->form_validation->set_rules('biaya_administrasi','Biaya Administrasi','required');

		if ($this->form_validation->run() == FALSE){\
			redirect('belanja/create');
		}else{
			$this->model->insert($transaksi);
			redirect('belanja');
		}
	}

	public function getPasienonKeluarga()
	{
		$kode_keluarga = $this->input->post('kode_keluarga');
		$data = $this->model->getPasienonKeluarga($kode_keluarga);
		// die(var_dump($data));
		echo json_encode($data);
	}
}
