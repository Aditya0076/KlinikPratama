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

	public function search()
	{
		$nama_pasien = $this->input->post('nama_pasien');
		$data['pasien'] = $this->model->searchPasien($nama_pasien);
		$this->load->view('pasien/read',$data);
	}

	public function create()
	{
		$data['kepala_keluarga'] = $this->model->getKepala_keluarga();
		$this->load->view('pasien/create',$data);
	}

	public function insert()
	{
		$data['kepala_keluarga'] = $this->model->getKepala_keluarga();
		$kode_keluarga = $this->input->post('kode_keluarga');
		$nama_pasien = $this->input->post('nama_pasien');
		$umur = $this->input->post('umur');
		$jenis_kelamin = $this->input->post('jenis_kelamin');

		$pasien = array(
			'kode_keluarga' => $kode_keluarga,
			'nama_pasien' => $nama_pasien,
			'umur' => $umur,
			'jenis_kelamin' => $jenis_kelamin
		);

		$this->form_validation->set_rules('kode_keluarga','Kode Keluarga','required');
		$this->form_validation->set_rules('nama_pasien','Nama Pasien','required');
		$this->form_validation->set_rules('umur','Umur','required');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
		
		if ($this->form_validation->run() == FALSE){
			redirect('pasien/create');
		}else{
			$this->model->insert($pasien);
			$this->session->set_flashdata('flash','Ditambahkan');
			redirect('pasien');
		}
	}

	public function update($kode_pasien)
	{
		$data['pasien'] = $this->model->getPasien($kode_pasien);
		$data['kepala'] = $this->model->getKepala_keluarga();
		$this->load->view('pasien/update',$data);
	}
	
	public function replace($kode_pasien_received)
	{
		$kode_pasien = $kode_pasien_received;
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

		$this->form_validation->set_rules('kode_keluarga','Kode Keluarga','required');
		$this->form_validation->set_rules('nama_pasien','Nama Pasien','required');
		$this->form_validation->set_rules('umur','Umur','required');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
		
		if($this->form_validation->run() == FALSE){
			redirect('pasien/update/' . $kode_pasien);
		}else{
			$this->model->update($pasien);
			$this->session->set_flashdata('flash','Diedit');
			redirect('pasien');
		}
	}

	public function delete($kode_pasien)
	{
		$this->model->delete($kode_pasien);
		$this->session->set_flashdata('flash','Dihapus');
		redirect('pasien');
	}
}
