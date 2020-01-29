<?php 
/**
 * 
 */
class Dusun extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('DusunModel', 'model');
	}

	/*public function index()
	{
		// $data['dusun'] = $this->model->getAll();
		$this->load->view('dusun/create',$data);
	}*/

	public function index()
	{
		$data['desa'] = $this->model->getDesa();
		$this->load->view('dusun/create',$data);
	}

	public function insert()
	{
		$nama_dusun = $this->input->post('nama_dusun');
		$kode_desa = $this->input->post('kode_desa');

		$dusun = array(
			'nama_dusun' => $nama_dusun,
			'kode_desa' => $kode_desa,
		);

		$this->model->insert($dusun);
		$this->session->set_flashdata('create','<div stlye="color: blue">Data berhasil ditambahkan</div>');
		redirect('dusun');
	}

	public function update($kode_dusun)
	{
		$data['dusun'] = $this->model->getDusun($kode_dusun);
		$this->load->view('dusun/read',$data);
	}

	public function replace()
	{
		$kode_dusun = $this->input->post('kode_dusun');
		$nama_dusun = $this->input->post('nama_dusun');
		$kode_desa = $this->input->post('kode_desa');

		$dusun = array(
			'kode_dusun' => $kode_dusun,
			'nama_dusun' => $nama_dusun,
			'kode_desa' => $kode_desa,
		);

		$this->model->update($dusun);
		$this->session->set_flashdata('update','<div stlye="color: blue">Data berhasil diedit</div>');
		redirect('dusun');
	}

	public function delete($kode_dusun)
	{
		$this->model->delete($kode_dusun);
		$this->session->set_flashdata('delete','<div stlye="color: blue">Data berhasil dihapus</div>');
		redirect('dusun');
	}
}
