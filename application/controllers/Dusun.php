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

	public function index(){
		//ambil data searching
		if($this->input->post('submit')){
			$data['keyword'] = $this->input->post('keyword');
			if(!strcmp($data['keyword'],'semua')){
				$this->session->unset_userdata('keyword','kelas');
				$data['keyword'] = null;
			}else{
				$keyword = array(
					'kelas' => 'dusun',
					'keyword' => $data['keyword']
				);
				$this->session->set_userdata($keyword);
			}
		}else{
			if(!strcmp($this->session->userdata('kelas'),'dusun'))
				$data['keyword'] = $this->session->userdata('keyword');
			else
				$data['keyword'] = null;
		}

		//config pagination
		$this->db->like('nama_dusun',$data['keyword']);
		$this->db->from('dusun');
		$config['base_url'] = 'http://localhost/KlinikPratama/dusun/index/';
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 15;

		//initialize
		$this->pagination->initialize($config);

		if(!strcmp($data['keyword'],'semua'))
			$data['start'] = 1;
		else
			$data['start'] = $this->uri->segment(3);

		$data['dusun'] = $this->model->getAll($config['per_page'],$data['start'],$data['keyword']);
		$this->load->view('dusun/read',$data);
	}

	public function create()
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
		$data['dusun'] = $this->model->getDusun($kode_dusun); //die(
		$data['desa'] = $this->model->getDesa();
		$this->load->view('dusun/update',$data);
	}

	public function replace($kode_dusun_received)
	{
		$kode_dusun = $kode_dusun_received;
		$nama_dusun = $this->input->post('nama_dusun');
		$kode_desa = $this->input->post('kode_desa');
		$simbol = $this->input->post('simbol');

		$dusun = array(
			'nama_dusun' => $nama_dusun,
			'kode_desa' => $kode_desa,
			'simbol' => $simbol
		);

		// die(var_dump($dusun));
		$this->form_validation->set_rules('nama_dusun','Nama Dusun','required');
		$this->form_validation->set_rules('kode_desa','Nama Desa','required');
		// $this->form_validation->set_rules('simbol','Kode Dusun','required');
		
		if ($this->form_validation->run() == FALSE){
			// redirect('dusun/update/' . $kode_dusun);
		}else{
			$this->model->update($dusun,$kode_dusun);
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
