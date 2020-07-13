<?php 
/**
 * 
 */
class kode extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('kodeModel','model');
	}

	public function index(){
		if($this->input->post('submit')){
			$data['keyword'] = $this->input->post('keyword');;
			if(!strcmp($data['keyword'], 'semua')){
				$this->session->unset_userdata('keyword','kelas');
				$data['keyword'] = null;
			}else{
				$keyword = [
					'kelas' => 'kode',
					'keyword' => $data['keyword']
				];
				$this->session->set_userdata($keyword);
			}
		}else{
			if(!strcmp($this->session->userdata('kelas'), 'kode'))
				$data['keyword'] = $this->session->userdata('keyword');
			else
				$data['keyword'] = null;
		}

		//convert nama_dusun to kode_dusun
		if($data['keyword']){
			$data['keyword'] = $this->model->getKodeByName($data['keyword']);
		}

		//config pagination
		$this->db->like('kode_dusun',$data['keyword']);
		$this->db->from('kode');
		$config['base_url'] = 'http://localhost/KlinikPratama/kode/index/';
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 10;

		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['kode'] = $this->model->getKode($config['per_page'],$data['start'],$data['keyword']);
		$this->load->view('kode_terakhir_kepala_keluarga/read',$data);
	}
}
 ?>