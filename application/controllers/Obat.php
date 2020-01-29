<?php 
/**
 * 
 */
class Obat extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('ObatModel', 'model');
	}

	public function index()
	{
		$data['obat'] = $this->model->getAll();
		$this->load->view('obat/read',$data);
	}

	public function create()
	{
		$this->load->view('obat/create');
	}

	public function insert()
	{
		$nama_obat = $this->input->post('nama_obat');
		$jenis_obat = $this->input->post('jenis_obat');
		$jumlah_obat = $this->input->post('jumlah_obat');

		$obat = array(
			'nama_obat' => $nama_obat,
			'jenis_obat' => $jenis_obat,
			'jumlah_obat' => $jumlah_obat
		);

		$this->model->insert($obat);
		$this->session->set_flashdata('create','<div stlye="color: blue">Data berhasil ditambahkan</div>');
		redirect('obat');
	}

	public function update($id_obat)
	{
		$data['obat'] = $this->model->getObat($id_obat);
		$this->load->view('obat/update',$data);
	}

	public function replace($id_obat_received)
	{
		$id_obat = $id_obat_received;
		$nama_obat = $this->input->post('nama_obat');
		$jenis_obat = $this->input->post('jenis_obat');
		$jumlah_obat = $this->input->post('jumlah_obat');

		$obat = array(
			'id_obat' => $id_obat,
			'nama_obat' => $nama_obat,
			'jenis_obat' => $jenis_obat,
			'jumlah_obat' => $jumlah_obat
		);

//		die(var_dump($obat));

		$this->model->update($obat);
		$this->session->set_flashdata('update','<div stlye="color: blue">Data berhasil diedit</div>');
		redirect('obat');
	}

	public function delete($id_obat)
	{
		$this->model->delete($id_obat);
		$this->session->set_flashdata('create','<div stlye="color: blue">Data berhasil dihapus</div>');
		redirect('obat');
	}
}
