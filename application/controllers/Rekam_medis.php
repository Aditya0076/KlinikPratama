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

	public function riwayat($kode_pasien = null){
		/*if($kode_pasien != null)
			$this->session->set_userdata(array('kode_pasien' => $kode_pasien));
		else
			$kode_pasien = $this->session->userdata['kode_pasien'];
		*/
		$data['pasien'] = $this->model->getPasienByKode($kode_pasien);
		// die(var_dump($data['pasien']));
		//config pagination
		$this->db->from('rekam_medis');
		$this->db->where('kode_pasien',$kode_pasien);
    	$config['base_url'] = 'http://localhost/KlinikPratama/rekam_medis/riwayat/' . $kode_pasien . '/';
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 2;

		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(4);
		$data['rekam_medis'] = $this->model->getRekamByKode($config['per_page'],$data['start'],$kode_pasien);
		$this->load->view('rekam_medis/riwayat_pasien',$data);
	}

	public function create()
	{
		$data['pasien'] = $this->model->getPasien();
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
			$this->session->set_flashdata('flash','Ditambahkan');
			redirect('rekam_medis/riwayat/' . $kode_pasien);
		}
	}

	public  function update($kode_rekam){
		$data['rekam_medis'] = $this->model->getRekam($kode_rekam);
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

		$this->form_validation->set_rules('waktu','Waktu','required');
		$this->form_validation->set_rules('kode_pasien','Kode Pasien','required');
		$this->form_validation->set_rules('anamnese','Anamnese','required');
		$this->form_validation->set_rules('diagnosa','Diagnosa','required');
		$this->form_validation->set_rules('terapi','Terapi','required');
		$this->form_validation->set_rules('biaya','Biaya','required');

		if ($this->form_validation->run() == FALSE){
			redirect('rekam_medis/update/' . $kode_rekam);
		}else{
			$this->model->update($rekam_medis);
			$this->session->set_flashdata('flash','Diedit');
			redirect('rekam_medis/riwayat/' . $kode_pasien);
		}
	}

	public function delete($kode_rekam, $kode_pasien)
	{
		$this->model->delete($kode_rekam);
		$this->session->set_flashdata('flash','Dihapus');
		redirect('rekam_medis/riwayat/' . $kode_pasien);
	}
}
