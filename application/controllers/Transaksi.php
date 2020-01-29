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

	public function create()
	{
		$this->load->view('transaksi/create');
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

		// die(var_dump($transaksi));
		$this->model->insert($transaksi);
		$this->session->set_flashdata('create','<div stlye="color: blue">Data berhasil ditambahkan</div>');
		redirect('transaksi');
	}

	public function getPasienonKeluarga()
	{
		$kode_keluarga = $this->input->post('kode_keluarga');
		$data = $this->model->getPasienonKeluarga($kode_keluarga);
		// die(var_dump($data));
		echo json_encode($data);
	}
}
