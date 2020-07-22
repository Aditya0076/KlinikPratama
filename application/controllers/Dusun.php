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

	public function index()
	{
		$data['desa'] = $this->model->getDesa();
		$this->load->view('dusun/create',$data);
	}

	public function insert()
	{
		$nama_dusun = $this->input->post('nama_dusun');
		$kode_desa = $this->input->post('kode_desa');
		$simbol= $this->input->post('simbol');

		$dusun = array(
			'nama_dusun' => $nama_dusun,
			'kode_desa' => $kode_desa,
			'simbol' => $simbol
		);

		$this->form_validation->set_rules('nama_dusun','Nama Dusun','required');
		$this->form_validation->set_rules('kode_desa','Kode Desa','required');
		$this->form_validation->set_rules('simbol','Kode Dusun','required');

		if ($this->form_validation->run()== FALSE){
			redirect('dusun');
		}else{
			$this->model->insert($dusun);
			$this->session->set_flashdata('flash','Ditambahkan');
			redirect('dusun');
		}
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

		$this->form_validation->set_rules('nama_dusun','Nama Dusun','required');
		$this->form_validation->set_rules('kode_desa','Kode Desa','required');
		$this->form_validation->set_rules('kode_desa','Nama Desa','required');
		
		if ($this->form_validation->run() == FALSE){
			redirect('dusun/update/' . $kode_dusun);
		}else{
			$this->model->update($dusun);
			$this->session->set_flashdata('flash','Diedit');
			redirect('dusun');
		}
}

	public function delete($kode_dusun)
	{
		$this->model->delete($kode_dusun);
		$this->session->set_flashdata('flash','Dihapus');
		redirect('dusun');
	}
}
