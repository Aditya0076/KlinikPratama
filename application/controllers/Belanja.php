<?php 
class Belanja extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('BelanjaModel','model');
	}

	public function index()
	{
		$data['full'] = $this->model->getAll();

		$this->load->view('belanja/read',$data);
	}

	public function create()
	{
		$this->load->view('belanja/create');
	}

	public function insert()
	{
		$waktu = $this->input->post('waktu');
		$nama_barang = $this->input->post('nama_barang');
		$biaya = $this->input->post('biaya');


		$belanja = array(
			'waktu' => $waktu,
			'nama_barang' => $nama_barang,
			'biaya' => $biaya
		);

		$this->form_validation->set_rules('waktu','Waktu','required');
		$this->form_validation->set_rules('nama_barang','Nama Barang','required');
		$this->form_validation->set_rules('biaya','Biaya','required');

		if($this->form_validation->run() == FALSE)
			redirect('belanja/create');
		else{
			$this->model->insert($belanja);
			$this->session->set_flashdata('flash','Ditambahkan');
			redirect('belanja');
		}
	}

	public function update($kode_belanja)
	{
		$data['belanja'] = $this->model->getByKode($kode_belanja);
		$this->load->view('belanja/update',$data);
	}

	public function replace($kode_belanja_received)
	{
		$kode_belanja_received=$kode_belanja;
		$kode_belanja = $this->input->post('kode_belanja');
		$waktu = $this->input->post('waktu');
		$nama_barang = $this->input->post('nama_barang');
		$biaya = $this->input->post('biaya');

		$belanja = array(
			'kode_belanja' => $kode_belanja,
			'waktu' => $waktu,
			'nama_barang' => $nama_barang,
			'biaya' => $biaya
		);

		$this->form_validation->set_rules('waktu','Waktu','required');
		$this->form_validation->set_rules('nama_barang','Nama Barang','required');
		$this->form_validation->set_rules('biaya','Biaya','required');

		if($this->form_validation->run() == FALSE)
			redirect('belanja/update' . $kode_belanja);
		else{
			$this->model->update($belanja);
			$this->session->set_flashdata('flash','Diedit');
			redirect('belanja');
		}
	}

	public function delete($kode_belanja)
	{
		$this->model->delete($kode_belanja);
		$this->session->set_flashdata('flash','Dihapus');
		redirect('belanja');
	}
}
