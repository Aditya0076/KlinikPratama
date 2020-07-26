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
		if($this->input->post('submit')){
			$data['keyword'] = $this->input->post('keyword');
			if(!strcmp($data['keyword'],'semua')){
				$this->session->unset_userdata('keyword','kelas');
				$data['keyword'] = null;
			}else{
				$keyword = [
					'kelas' => 'obat',
					'keyword' => $data['keyword']
				];
				$this->session->set_userdata($keyword);
			}
 		}else{
 			if(!strcmp($this->session->userdata('kelas'),'obat'))
				$data['keyword'] = $this->session->userdata('keyword');	
			else
				$data['keyword'] = null;
 		}

 		//config pagination
 		$this->db->like('nama_obat', $data['keyword']);
 		$this->db->from('obat');
    	$config['base_url'] = 'http://localhost/KlinikPratama/obat/index/';
 		$config['total_rows'] = $this->db->count_all_results();
 		$config['per_page'] = 15;

 		//initialize
 		$this->pagination->initialize($config);

 		$data['start'] = $this->uri->segment(3);
 		$data['obat'] = $this->model->getObats($config['per_page'], $data['start'], $data['keyword']);
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
			// 'id_obat' => $id_obat,
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
			$this->model->update($obat,$id_obat);
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
