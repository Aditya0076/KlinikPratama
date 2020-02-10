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
		$data = $this->model->getAll();
		$this->load->view('belanja/read');
	}

	public function create()
	{
		$this->load->view('belanja/create');
	}

	public function insert()
	{
		$waktu = $this->input->post('waktu');
		$keterangan = $this->input->post('keterangan');
		$biaya = $this->input->post('biaya');


		$belanja = array(
			'waktu' => $waktu,
			'keterangan' => $keterangan,
			'biaya' => $biaya
		);

		$this->form_validation->set_rules('waktu','Waktu','required');
		$this->form_validation->set_rules('keterangan','Keterangan','required');
		$this->form_validation->set_rules('biaya','Biaya','required');

		if($this->form_validation->run() == FALSE)
			redirect('belanja/create');
		else{
			$this->model->insert($belanja);
			redirect('belanja');
		}
	}

	public function update($kode_belanja)
	{
		$data['belanja'] = $this->model->getByKode($kode_belanja);
		$this->load->view('belanja/update',$data);
	}

	public function replace()
	{
		$kode_belanja = $this->input->post('kode_belanja');
		$waktu = $this->input->post('waktu');
		$keterangan = $this->input->post('keterangan');
		$biaya = $this->input->post('biaya');

		$belanja = array(
			'kode_belanja' => $kode_belanja,
			'waktu' => $waktu,
			'keterangan' => $keterangan,
			'biaya' => $biaya
		);

		$this->form_validation->set_rules('kode_belanja','Kode Belanja','required');
		$this->form_validation->set_rules('waktu','Waktu','required');
		$this->form_validation->set_rules('keterangan','Keterangan','required');
		$this->form_validation->set_rules('biaya','Biaya','required');

		if($this->form_validation->run() == FALSE)
			redirect('belanja/update' . $kode_belanja);
		else{
			$this->model->update($belanja);
			redirect('belanja');
		}
	}

	public function delete($kode_belanja)
	{
		$this->model->delete($kode_belanja);
	}
}