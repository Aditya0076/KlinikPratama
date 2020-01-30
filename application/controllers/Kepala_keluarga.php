<?php 
/**
 * 
 */
class Kepala_keluarga extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Kepala_keluargaModel', 'model');
	}

	public function index()
	{
		$data['kepala_keluarga'] = $this->model->getAll();
		$this->load->view('kepala_keluarga/read',$data);
	}

	public function search()
	{
		$nama_kepala = $this->input->post('nama_kepala');
		$data['kepala_keluarga'] = $this->model->searchKepala($nama_kepala);
		$this->load->view('kepala_keluarga/read',$data);
	}

	public function create()
	{
		$data['dusun'] = $this->model->getDusun();
		$this->load->view('kepala_keluarga/create',$data);
	}

	public function insert()
	{
		$kode_keluarga = $this->input->post('kode_keluarga');
		$kode_dusun = $this->input->post('kode_dusun');
		$nama_kepala = $this->input->post('nama_kepala');
		$rt = $this->input->post('rt');

		$kepala_keluarga = array(
			'kode_keluarga' => $kode_keluarga,
			'kode_dusun' => $kode_dusun,
			'nama_kepala' => $nama_kepala,
			'rt' => $rt
		);

		if($message=$this->validate($kepala_keluarga)){
			$this->session->set_flashdata('gagal','<div>Data <span style="color:red"> ' . $message . '</span> kosong, mohon disi terlebih dahulu<div>');
			redirect('kepala_keluarga/create');
		}else{
			$this->model->insert($kepala_keluarga);
			$this->session->set_flashdata('create','<div stlye="color: blue">Data berhasil ditambahkan</div>');
			redirect('kepala_keluarga');
		}
	}

	public function update($kode_keluarga)
	{
		$data['kepala_keluarga'] = $this->model->getKepala($kode_keluarga);
		$data['dusun'] = $this->model->getDusun();
		$this->load->view('kepala_keluarga/update',$data);
	}


	public function replace($kode_keluarga_received)
	{
		$kode_keluarga = $kode_keluarga_received;
		$kode_dusun = $this->input->post('kode_dusun');
		$nama_kepala = $this->input->post('nama_kepala');
		$rt = $this->input->post('rt');

		$kepala_keluarga = array(
			'kode_keluarga' => $kode_keluarga,
			'kode_dusun' => $kode_dusun,
			'nama_kepala' => $nama_kepala,
			'rt' => $rt
		);

		$message = $this->validate($kepala_keluarga)
		if($message){
			$this->session->set_flashdata('gagal','<div>Data <span style="color:red"> ' . $message . '</span> kosong, mohon disi terlebih dahulu<div>');
			redirect('kepala_keluarga/update/'.$kode_keluarga);
		}else{
			$this->model->update($kepala_keluarga);
			$this->session->set_flashdata('update','<div stlye="color: blue">Data berhasil diedit</div>');
			redirect('kepala_keluarga');
		}
	}

	public function delete($kode_keluarga)
	{
		$this->model->delete($kode_keluarga);
<<<<<<< HEAD
		echo "Terhapus.";
=======
		$this->session->set_flashdata('delete','<div stlye="color: blue">Data berhasil dihapus</div>');
>>>>>>> 37e609596b8e501e0caa35957a4e36e1774d1c25
		redirect('kepala_keluarga');
	}
	
	public function validate($kepala_keluarga)
	{
		$name = array(
			'kode_keluarga' => 'Kode keluarga',
			'kode_dusun' => 'Nama dusun',
			'nama_kepala' => 'Nama kepala',
			'rt' => 'rt'
		);

		$message = "";
		foreach ($kepala_keluarga as $key => $value) {
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
