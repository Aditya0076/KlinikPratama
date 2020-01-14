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
		$harga_transaksi = $this->input->post('harga_transaksi');

		$transaksi = array(
			'waktu' => $waktu,
			'kode_keluarga' => $kode_keluarga,
			'kode_pasien' => $kode_pasien,
			'harga_transaksi' => $harga_transaksi
		);

		$this->model->insert($transaksi);
		redirect('transaksi');
	}

	public function getPasienonKeluarga($kode_keluarga)
	{
		$data = $this->model->getPasienonKeluarga($kode_keluarga);
		echo json_encode($data);
	}
}
