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
	}

	public function index()
	{
		// $data['pasien'] = $this->model->getAll();	

		//config pagination
		$config['base_url'] = 'http://localhost/KlinikPratama/pasien/index/';
		$config['total_rows'] = $this->model->countAllPasien();
		$config['per_page'] = 3;
		$config['num_links'] = 2;

		//styling
		$config['full_tag_open'] = '<nav aria-label="Page navigation example"> <ul class="pagination">';
  		$config['full_tag_close'] = '</ul></nav>';

  		$config['first_link'] = 'First';
  		$config['first_tag_open'] = '<li class="page-item">';
  		$config['first_tag_close'] = '</li>';

  		$config['last_link'] = 'Last';
  		$config['last_tag_open'] = '<li class="page-item">';
  		$config['last_tag_close'] = '</li>';

  		$config['next_link'] = '&raquo';
  		$config['next_tag_open'] = '<li class="page-item">';
  		$config['next_tag_close'] = '</li>';

  		$config['prev_link'] = '&laquo';
  		$config['prev_tag_open'] = '<li class="page-item">';
  		$config['prev_tag_close'] = '</li>';

  		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
  		$config['cur_tag_close'] = '</a></li>';  		

  		$config['num_tag_open'] = '<li class="page-item">';
  		$config['num_tag_close'] = '</li>';  		

  		$config['attributes'] = array('class' => 'page-link');
		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['pasien'] = $this->model->getPasiens($config['per_page'],$data['start']);
		// var_dump($data); die();
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

		$this->form_validation->set_rules('kode_keluarga','Kode Keluarga','required');
		$this->form_validation->set_rules('nama_pasien','Nama Pasien','required');
		$this->form_validation->set_rules('umur','Umur','required');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
		
		if ($this->form_validation->run() == FALSE){
			redirect('pasien/create');
		}else{
			$this->model->insert($pasien);
			$this->session->set_flashdata('flash','Ditambahkan');
			redirect('pasien');
		}
	}

	public function update($kode_pasien)
	{
		$data['pasien'] = $this->model->getPasien($kode_pasien);
		$data['kepala'] = $this->model->getKepala_keluarga();
		$this->load->view('pasien/update',$data);
	}
	
	public function replace($kode_pasien_received)
	{
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

		$this->form_validation->set_rules('kode_keluarga','Kode Keluarga','required');
		$this->form_validation->set_rules('nama_pasien','Nama Pasien','required');
		$this->form_validation->set_rules('umur','Umur','required');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
		
		if($this->form_validation->run() == FALSE){
			redirect('pasien/update/' . $kode_pasien);
		}else{
			$this->model->update($pasien);
			$this->session->set_flashdata('flash','Diedit');
			redirect('pasien');
		}
	}

	public function delete($kode_pasien)
	{
		$this->model->delete($kode_pasien);
		$this->session->set_flashdata('flash','Dihapus');
		redirect('pasien');
	}
}
