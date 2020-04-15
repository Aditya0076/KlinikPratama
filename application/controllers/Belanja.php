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
		// $data['full'] = $this->model->getAll();
		// $this->load->view('belanja/read',$data);
		if($this->input->post('submit')){
			$data['keyword'] = $this->input->post('keyword');
			if(!strcmp($data['keyword'],'semua')){
				$this->session->unset_userdata('keyword');
				$data['keyword'] = null;
			}else{
				$this->session->set_userdata('keyword',$data['keyword']);
			}
		}else{
			$data['keyword'] = $this->session->userdata('keyword');
		}

		//config pagination
		$this->db->like('waktu',$data['keyword']);
		$this->db->from('belanja');
    	$config['base_url'] = 'http://localhost/KlinikPratama/belanja/index/';
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 3;

		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['belanja'] = $this->model->getBelanjas($config['per_page'],$data['start'],$data['keyword']);
		$this->load->view('belanja/read',$data);
	}

	public function read(){
		$laporan = array('kode','waktu','keterangan','masuk','keluar','total');
		// $belanja = $this->model->getBelanja();
		// foreach ($belanja as $belanja) {
		// 	$laporan = array(
		// 		'kode' => $belanja['kode_belanja'],
		// 		'waktu' => $belanja['waktu'],
		// 		'keterangan' => $belanja['nama_barang'],
		// 		'masuk' => '',
		// 		'keluar' => $belanja['biaya'],
		// 		'total' => '' 
		// 	);
		// }
		$riwayat = $this->model->getRiwayat();
		die(var_dump($riwayat));
		foreach ($riwayat as $riwayat) {
			$laporan = array(
				'kode' => '',
				'waktu' => $riwayat['waktu'],
				'keterangan' => 'masuk',
				'masuk' => '',
				'keluar' => $riwayat['biaya'],
				'total' => ''
			);
		}

		$this->model->update($riwayat);
		echo "sukses";
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
		$kode_belanja = $kode_belanja_received;
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
