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
		$data['kepala_keluarga'] = $this->model->searchKepala($search);
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
		$alamat = $this->input->post('alamat');

		$kepala_keluarga = array(
			'kode_keluarga' => $kode_keluarga,
			'kode_dusun' => $kode_dusun,
			'nama_kepala' => $nama_kepala,
			'alamat' => $alamat
		);

		$this->model->insert($kepala_keluarga);
		redirect('kepala_keluarga');
	}

	public function update($kode_keluarga)
	{
		$data['kepala_keluarga'] = $this->model->getKepala($kode_keluarga);
		$data['dusun'] = $this->model->getDusun();
//		die(var_dump($data['dusun']));
		$this->load->view('kepala_keluarga/update',$data);
	}

	public function replace()
	{
		$kode_keluarga = $this->input->post('kode_keluarga');
		$kode_dusun = $this->input->post('kode_dusun');
		$nama_kepala = $this->input->post('nama_kepala');
		$alamat = $this->input->post('alamat');

		$kepala_keluarga = array(
			'kode_keluarga' => $kode_keluarga,
			'kode_dusun' => $kode_dusun,
			'nama_kepala' => $nama_kepala,
			'alamat' => $alamat
		);

		$this->model->update($kepala_keluarga);
		redirect('kepala_keluarga');
	}

	public function delete($kode_keluarga)
	{
		$this->model->delete($kode_keluarga);
		redirect('kepala_keluarga');
	}
}
