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
		$this->load->library('form_validation');
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
		$this->form_validation->set_rules('nama_pasien','Nama pasien','required');
		$this->form_validation->set_rules('umur','Umur','required');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','isset');
		if ($this->form_validation->run()== FALSE){
			$this->load->view('pasien/create',$data);

<<<<<<< HEAD
		$this->form_validation->set_rules('kode_keluarga','Kode Keluarga','required');
		$this->form_validation->set_rules('nama_pasien','Nama Pasien','required');
		$this->form_validation->set_rules('umur','Umur','required');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
		
		if ($this->form_validation->run() == FALSE){
			redirect('pasien/create');
		}else{
=======
		}
		else{
>>>>>>> 849c3e840538df4c35eb0a929b7848ad081c8c40
			$this->model->insert($pasien);
			redirect('pasien');
		}
//		if($message=$this->validate($pasien)){
//			$this->session->set_flashdata('gagal','<div>Data <span style="color:red"> ' . $message . '</span> kosong, mohon disi terlebih dahulu<div>');
//			redirect('pasien/create');
//		}else{
//			$this->model->insert($pasien);
//			$this->session->set_flashdata('create','<div stlye="color: blue">Data berhasil ditambahkan</div>');
//			redirect('pasien');
//		}
	}

	public function update($kode_pasien)
	{
		$data['pasien'] = $this->model->getPasien($kode_pasien);
		$data['kepala'] = $this->model->getKepala_keluarga();
		$this->load->view('pasien/update',$data);
	}
	
	public function replace($kode_pasien_received)
	{
		$data['pasien'] = $this->model->getPasien($kode_pasien);
		$data['kepala'] = $this->model->getKepala_keluarga();
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

<<<<<<< HEAD
		$this->form_validation->set_rules('kode_pasien','Kode Pasien','required');
		$this->form_validation->set_rules('kode_keluarga','Kode Keluarga','required');
		$this->form_validation->set_rules('nama_pasien','Nama Pasien','required');
		$this->form_validation->set_rules('umur','Umur','required');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
		
		if ($this->form_validation->run() == FALSE){
			redirect('pasien/update' . $kode_pasien);
		}else{
			$this->model->update($pasien);
=======
		$this->form_validation->set_rules('nama_pasien','Nama pasien','required');
		$this->form_validation->set_rules('umur','Umur','required');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','isset');
		if ($this->form_validation->run()== FALSE){
			$this->load->view('pasien/update',$data);
		}
		else{
			$this->model->insert($pasien);
>>>>>>> 849c3e840538df4c35eb0a929b7848ad081c8c40
			redirect('pasien');
		}
//		if($message=$this->validate($pasien)){
//			$this->session->set_flashdata('gagal','<div>Data <span style="color:red"> ' . $message . '</span> kosong, mohon disi terlebih dahulu<div>');
//			redirect('pasien/update' . $kode_pasien);
//		}else{
//			$this->model->update($pasien);
//			$this->session->set_flashdata('update','<div stlye="color: blue">Data berhasil diedit</div>');
//			redirect('pasien');
//		}
	}

	public function delete($kode_pasien)
	{
		$this->model->delete($kode_pasien);
		$this->session->set_flashdata('delete','<div stlye="color: blue">Data berhasil dihapus</div>');
		redirect('pasien');
	}

	public function validate($pasien)
	{
		$name = array(
			'kode_pasien' => 'Kode pasien',
			'kode_keluarga' => 'Kode Keluarga',
			'nama_pasien' => 'Nama pasien',
			'umur' => 'Umur',
			'jenis_kelamin' => 'Jenis Kelamin'
		);

		$message = "";
		foreach ($pasien as $key => $value) {
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
