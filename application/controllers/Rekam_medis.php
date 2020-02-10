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

		$this->form_validation->set_rules('waktu','Tanggal','required');
		$this->form_validation->set_rules('kode_pasien','Kode Pasien','required');
		$this->form_validation->set_rules('anamnese','Anamnese','required');
		$this->form_validation->set_rules('diagnosa','Diagnosa','required');
		$this->form_validation->set_rules('terapi','Terapi','required');
		$this->form_validation->set_rules('biaya','Biaya','required');
		
		if ($this->form_validation->run() == FALSE){
			redirect('rekam_medis/create');
		}else{
			$this->model->insert($rekam_medis);
			redirect('rekam_medis/readRekam/' . $kode_pasien);
		}
//		if($message=$this->validate($rekam_medis)){
//			$this->session->set_flashdata('gagal','<div>Data <span style="color:red"> ' . $message . '</span> kosong, mohon disi terlebih dahulu<div>');
//			redirect('rekam_medis/create');
//		}else{
//			$this->model->insert($rekam_medis);
//			$this->session->set_flashdata('create','<div stlye="color: blue">Data berhasil ditambahkan</div>');
//			redirect('rekam_medis/readRekam/' . $kode_pasien);
//		}
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
		// die(var_dump($rekam_medis));
		$this->form_validation->set_rules('kode_rekam','Kode Rekam','required');
		$this->form_validation->set_rules('waktu','Waktu','required');
		$this->form_validation->set_rules('kode_pasien','Kode Pasien','required');
		$this->form_validation->set_rules('anamnese','Anamnese','required');
		$this->form_validation->set_rules('diagnosa','Diagnosa','required');
		$this->form_validation->set_rules('terapi','Terapi','required');
		$this->form_validation->set_rules('biaya','Biaya','required');

		if ($this->form_validation->run() == FALSE){
			redirect('rekam_medis/update' . $kode_rekam);
		}else{
			$this->model->update($rekam_medis);
			redirect('rekam_medis/readRekam/' . $kode_pasien);
		}
	}

	public function delete($kode_rekam, $kode_pasien)
	{
		$this->model->delete($kode_rekam);
		$this->session->set_flashdata('delete','<div stlye="color: blue">Data berhasil dihapus</div>');
		redirect('rekam_medis/readRekam/' . $kode_pasien);
	}

	public function validate($rekam_medis)
	{
		$name = array(
			'kode_rekam' => 'Kode Rekam',
			'waktu' => 'Waktu',
			'kode_pasien' => 'Kode pasien',
			'anamnese' => 'Anamnese',
			'diagnosa' => 'Diagnosa',
			'terapi' => 'Terapi',
			'biaya' => 'Biaya'
		);

		$message = "";
		foreach ($rekam_medis as $key => $value) {
			if(!$value){
				if(!$message){
					foreach ($name as $name => $n_value) {
						if(!strcmp($key,$name))
							$message = $n_value;
					}
				}
				else{
					foreach ($name as $name => $n_value) {
						if(!strcmp($key,$name))
							$message = $message . ', ' . $n_value;  
					}
				}
			}
		}
		return $message;
	}
}
