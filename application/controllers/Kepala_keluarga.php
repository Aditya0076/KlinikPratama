<?php 
class Kepala_keluarga extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Kepala_keluargaModel', 'model');
	}

	public function index()
	{
		// $data['kepala_keluarga'] = $this->model->getAll();
		// $this->load->view('kepala_keluarga/read',$data);

		//ambil data searching
		if($this->input->post('submit')){
			$data['keyword'] = $this->input->post('keyword');
			if(!strcmp($data['keyword'],'semua')){
				$this->session->unset_userdata('keyword','kelas');
				$data['keyword'] = null; 
			}else{
				$keyword = [
					'kelas' => 'kepala_keluarga',
					'keyword' => $data['keyword']
				];
				$this->session->set_userdata($keyword);
			}
		}else{
			if(!strcmp($this->session->userdata('kelas'),'kepala_keluarga'))
				$data['keyword'] = $this->session->userdata('keyword');	
			else
				$data['keyword'] = null;
		}

		//config pagination
		$this->db->like('nama_kepala',$data['keyword']);
		$this->db->from('kepala_keluarga');
    	$config['base_url'] = 'http://localhost/KlinikPratama/kepala_keluarga/index/';
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 10;

		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['kepala_keluarga'] = $this->model->getKepalas($config['per_page'],$data['start'],$data['keyword']);
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
		
		$this->form_validation->set_rules('kode_keluarga','Kode keluarga','required');
		$this->form_validation->set_rules('nama_kepala','Nama Kepala Keluarga','required');
		if ($this->form_validation->run()== FALSE){
			redirect('kepala_keluarga/create');
		}else{
			$this->session->set_flashdata('flash','Ditambahkan');
			$this->model->insert($kepala_keluarga);
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
		//$data['kepala_keluarga'] = $this->model->getKepala($kode_keluarga);
		//$data['dusun'] = $this->model->getDusun();
		$kode_keluarga = $kode_keluarga_received;
		$kode_dusun = $this->input->post('kode_dusun');
		$nama_kepala = $this->input->post('nama_kepala');
		$rt = $this->input->post('rt');

		$kepala_keluarga = array(
			//'kode_keluarga' => $kode_keluarga,
			'kode_dusun' => $kode_dusun,
			'nama_kepala' => $nama_kepala,
			'rt' => $rt
		);
		
		$this->form_validation->set_rules('kode_keluarga','Kode keluarga','required');
		$this->form_validation->set_rules('nama_kepala','Nama Kepala Keluarga','required');
		
		if ($this->form_validation->run() == FALSE){
			redirect('kepala_keluarga/update/'. $kode_keluarga);
		}else{
			$this->model->update($kepala_keluarga,$kode_keluarga);
			$this->session->set_flashdata('flash','Diedit');
			redirect('kepala_keluarga');
		}
	}

	public function delete($kode_keluarga)
	{
		$this->session->set_flashdata('flash','Dihapus');
		$this->model->delete($kode_keluarga);
		redirect('kepala_keluarga');
	}
}
