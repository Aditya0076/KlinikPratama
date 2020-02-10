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

		$this->form_validation->set_rules('nama_obat','Nama Obat','required');
		$this->form_validation->set_rules('jenis_obat','Jenis Obat','required');
		$this->form_validation->set_rules('jumlah_obat','Jumlah Obat','required');
		
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('flash','Ditambahkan');
			redirect('obat/create');
		}else{
			$this->model->insert($obat);
			redirect('obat');
		}
	}

	public function update($id_obat)
	{
		$data['obat'] = $this->model->getObat($id_obat);
		$this->load->view('obat/update',$data);
	}

	public function replace($id_obat_received)
	{
		$id_obat = $id_obat_received;
		$data['obat'] = $this->model->getObat($id_obat);
		$nama_obat = $this->input->post('nama_obat');
		$jenis_obat = $this->input->post('jenis_obat');
		$jumlah_obat = $this->input->post('jumlah_obat');

		$obat = array(
			'id_obat' => $id_obat,
			'nama_obat' => $nama_obat,
			'jenis_obat' => $jenis_obat,
			'jumlah_obat' => $jumlah_obat
		);

		$this->form_validation->set_rules('nama_obat','Nama Obat','required');
		$this->form_validation->set_rules('jenis_obat','Jenis Obat','required');
		$this->form_validation->set_rules('jumlah_obat','Jumlah Obat','required');
		
		if ($this->form_validation->run() == FALSE){
			redirect('obat/update' . $id_obat);
		}else{
			$this->model->update($obat);
			$this->session->set_flashdata('flash','Diedit');
			redirect('obat');
		}
	}

	public function delete($id_obat)
	{
		$this->model->delete($id_obat);
		$this->session->set_flashdata('flash','Dihapus');
		redirect('obat');
	}
}
