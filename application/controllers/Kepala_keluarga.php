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
		//get kode dusun from tampil_dusun page
		if($this->input->post('kode_dusun')){
			$kode_dusun = $this->input->post('kode_dusun');
			$this->session->set_userdata('kode_dusun', $kode_dusun);
		}else{
			$kode_dusun = $this->session->userdata('kode_dusun');
		}

		//ambil data searching
		if($this->input->post('submit')){
			$data['keyword'] = $this->input->post('keyword');
			if(!strcmp($data['keyword'],'semua')){
				$this->session->unset_userdata('keyword','kelas');
				$data['keyword'] = null;
			}else{
				$keyword = array(
					'kelas' => 'kepala_keluarga',
					'keyword' => $data['keyword']
			);
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
		$this->db->where('kode_dusun',$kode_dusun);
		$this->db->from('kepala_keluarga');
    	$config['base_url'] = 'http://localhost/KlinikPratama/kepala_keluarga/index/';
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 15;

		//initialize
		$this->pagination->initialize($config);

		if(!strcmp($data['keyword'],'semua'))
			$data['start'] = 1;
		else
			$data['start'] = $this->uri->segment(3);
		$data['kepala_keluarga'] = $this->model->getKepalas($config['per_page'],$data['start'],$data['keyword'],$kode_dusun);
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
		//$data['dusun'] = $this->model->getDusun();
		$this->load->view('kepala_keluarga/create');//,$data);

	}

	public function getDusun()
	{
		$this->load->model('dusunModel','dusun');
		$dusun = $this->input->get('dusun');
		$query = $this->dusun->getDusunByName($dusun, 'nama_dusun');//die(var_dump($query));
		echo json_encode($query);
	}

	public function get_autocomplete()
	{
		$this->load->model('dusunModel','dusun');

		$term = $_GET['term'];
		if(isset($term)){
			$tes = $this->dusun->getDusunByName($term,'nama_dusun');

			$result = array();
			foreach ($tes as $company){
				$dusunLabel = $company['label'];
				if (strpos(strtoupper($dusunLabel),strtoupper($term)) !== FALSE){
					array_push($result,$company);
				}
			}
		}
		echo json_encode($result);
	}
	public function insert()
	{
		$kode_keluarga = $this->input->post('kode_keluarga');
		$kode_dusun = $this->input->post('kode_dusun');
		$nama_kepala = $this->input->post('nama_kepala');
		$rt = $this->input->post('rt');

		//get simbol (eg: A,B,C...etc) from dusun
		$this->load->model('dusunModel','dusun');
		$simbol = $this->dusun->getSimbolByKode($kode_dusun);
		$kode_keluarga = $simbol . $kode_keluarga;

		//make an associative array
		$kepala_keluarga = array(
			'kode_keluarga' => $kode_keluarga,
			'kode_dusun' => $kode_dusun,
			'nama_kepala' => $nama_kepala,
			'rt' => $rt
		);
		
		$this->form_validation->set_rules('kode_keluarga','Kode keluarga','required');
		$this->form_validation->set_rules('nama_kepala','Nama Kepala Keluarga','required');

		//update kode_terakhir_kepala_keluarga data 
		$this->load->model('KodeModel','kode');
		if($this->kode->getByDusun($kode_dusun)){
			$kode = array(
				'kode_terakhir' => $kode_keluarga
			);
			$this->kode->update($kode,$kode_dusun);
		}else{
			$kode = array(
				'kode_dusun' => $kode_dusun,
				'kode_terakhir' => $kode_keluarga
			);
			$this->kode->insert($kode);
		}

		//insert data to kepala_keluarga
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

	public function tampil_dusun()
	{
		//load dusunModel
		$this->load->model('dusunModel','dusun');

		if($this->input->post('submit')){
			$data['keyword'] = $this->input->post('keyword');
			if(!strcmp($data['keyword'],'semua')){
				$this->session->unset_userdata('keyword','kelas');
				$data['keyword'] = null;
			}else{
				$keyword = array(
					'kelas' => 'tampil_dusun',
					'keyword' => $data['keyword']
				);
				$this->session->set_userdata($keyword);
			}
		}else{
			if(!strcmp($this->session->userdata('kelas'),'tampil_dusun'))
				$data['keyword'] = $this->session->userdata('keyword');
			else
				$data['keyword'] = null;
		}

		//config pagination
		$this->db->like('nama_dusun',$data['keyword']);
		$this->db->from('dusun');
		$config['base_url'] = 'http://localhost/KlinikPratama/kepala_keluarga/tampil_dusun/';
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 15;

		//initialize
		$this->pagination->initialize($config);

		if(!strcmp($data['keyword'],'semua'))
			$data['start'] = 1;
		else
			$data['start'] = $this->uri->segment(3);

		$data['dusun'] = $this->dusun->getAll($config['per_page'],$data['start'],$data['keyword']);
		$this->load->view('kepala_keluarga/tampil_dusun',$data);
	}
}
