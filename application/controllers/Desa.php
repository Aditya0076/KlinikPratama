<?php
class Desa extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('DesaModel', 'model');
	}

	public function index()
	{
		$data['desa'] = $this->model->getAll();
		$this->load->view('desa/read',$data);
	}

	public function create()
	{
		$this->load->view('desa/create');
	}

	public function insert()
	{
		$nama_desa = $this->input->post('nama_desa');

		$desa = array('nama_desa' => $nama_desa);

		$this->model->insert($desa);

		redirect('desa');
	}

	public function update($kode_desa)
	{
		$data['pasien'] = $this->model->getDesa($kode_desa);
		$this->load->view('desa/update',$data);
	}

	public function replace()
	{
		$kode_desa = $this->input->post('kode_desa');
		$nama_desa = $this->input->post('nama_desa');

		$desa = array(
			'kode_desa' => $kode_desa,
			'nama_desa' => $nama_desa
		);

		$this->model->update($desa);
		redirect('desa');
	}

	public function delete($kode_desa)
	{
		$this->model->delete($kode_desa);
		redirect('desa');
	}
}