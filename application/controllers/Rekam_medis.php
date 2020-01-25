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
		$data['pasien'] = $this->model->getPasien();
		$this->load->view('rekam_medis/read',$data);
	}

	public function readRekam($kode_pasien){
		$data['pasien'] = $this->model->getPasienByKode($kode_pasien);
		$data['rekam_medis'] = $this->model->getRekamByKode($kode_pasien);
		$this->load->view('rekam_medis/riwayat_pasien',$data);
	}

	public function create()
	{
		$data['pasien'] = $this->model->getPasien();
//		die(var_dump($data));
		$this->load->view('rekam_medis/create',$data);
	}

	public function insert()
	{
		$waktu = $this->input->post('waktu');
		$kode_pasien = $this->input->post('kode_pasien');
		$anamnese = $this->input->post('anamnese');
		$diagnosa = $this->input->post('diagnosa');
		$terapi = $this->input->post('terapi');
		$biaya = $this->input->post('biaya');

		$rekam_medis = array(
			'waktu' => $waktu,
			'kode_pasien' => $kode_pasien,
			'anamnese' => $anamnese,
			'diagnosa' => $diagnosa,
			'terapi' => $terapi,
			'biaya' => $biaya
		);

		$this->model->insert($rekam_medis);
		redirect('rekam_medis/readRekam/' . $kode_pasien);
	}

	public  function update($kode_rekam){
		$data['rekam_medis'] = $this->model->getRekam($kode_rekam);
//		die(var_dump($data));
		$this->load->view('rekam_medis/update',$data);

	}

	public  function replace($kode_rekam_received){
		$kode_rekam = $kode_rekam_received;
		$waktu = $this->input->post('waktu');
		$kode_pasien = $this->input->post('kode_pasien');
		$anamnese = $this->input->post('anamnese');
		$diagnosa = $this->input->post('diagnosa');
		$terapi = $this->input->post('terapi');
		$biaya = $this->input->post('biaya');

		$rekam_medis = array(
			'kode_rekam' => $kode_rekam,
			'waktu' => $waktu,
			'kode_pasien' => $kode_pasien,
			'anamnese' => $anamnese,
			'diagnosa' => $diagnosa,
			'terapi' => $terapi,
			'biaya' => $biaya
		);

		$this->model->update($rekam_medis);
		redirect('rekam_medis/readRekam/' . $kode_pasien);
	}

	public function delete($kode_rekam, $kode_pasien)
	{
		$this->model->delete($kode_rekam);
		redirect('rekam_medis/readRekam/' . $kode_pasien);
	}
}
