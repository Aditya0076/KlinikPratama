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
				$this->session->unset_userdata('keyword','kelas');
				$data['keyword'] = null;
			}else{
				$keyword = [
					'kelas' => 'belanja',
					'keyword' => $data['keyword']
				];
				$this->session->set_userdata($keyword);
			}
		}else{
			if(!strcmp($this->session->userdata('kelas'),'belanja'))
				$data['keyword'] = $this->session->userdata('keyword');
			else
				$data['keyword'] = null;
		}

		//config pagination
		$this->db->like('waktu',$data['keyword']);
		$this->db->from('belanja');
    	$config['base_url'] = 'http://localhost/KlinikPratama/belanja/index/';
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 15;

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
		$keterangan = $this->input->post('keterangan');
		$keluar = $this->input->post('keluar');


		$belanja = array(
			'waktu' => $waktu,
			'keterangan' => $keterangan,
			'keluar' => $keluar
		);

		$this->form_validation->set_rules('waktu','Waktu','required');
		$this->form_validation->set_rules('keterangan','Keterangan','required');
		$this->form_validation->set_rules('keluar','Keluar','required');

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
		$keterangan = $this->input->post('keterangan');
		$keluar = $this->input->post('keluar');

		$belanja = array(
			//'kode_belanja' => $kode_belanja,
			'waktu' => $waktu,
			'keterangan' => $keterangan,
			'keluar' => $keluar
		);

		$this->form_validation->set_rules('waktu','Waktu','required');
		$this->form_validation->set_rules('keterangan','Keterangan','required');
		$this->form_validation->set_rules('keluar','Keluar','required');

		if($this->form_validation->run() == FALSE)
			redirect('belanja/update' . $kode_belanja);
		else{
			$this->model->update($belanja,$kode_belanja);
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

	public function hitungTotal()
	{

		//today
		$date = date('Y-m-d');
		//yesterday
		$prev_date = date('Y-m-d',time() - (60*60*24));

		//calculate the total of payment today
		$this->load->model('Rekam_medisModel','rekam');
		$totalPemasukan = $this->rekam->getTotalPemasukan($date);

		if($this->model->getTotal($date)){
			$laporan = $this->model->getTotal($date);
			if(($totalPemasukan - $laporan['masuk']) > 0){
				$this->model->delete($laporan['kode_belanja']);
			}else{
				redirect('belanja');
			}
		}

		//get total of yesterday
		$prev_total = $this->model->getTotal($prev_date); 
		//calculate total of money
		$total = $totalPemasukan + $prev_total['total'];

		// die(var_dump($total));
		$uangMasuk = [
			'waktu' => $date,
			'keterangan' => 'masuk',
			'masuk' => $totalPemasukan,
			'total' => $total
		];

		$this->model->insert($uangMasuk);

		//tomorrow
		$tomorrow = [
			'waktu' => date('Y-m-d', time() + (60*60*24)),//date('l', time() + (60*60*24)),
			'keterangan' => date('l', time() + (60*60*24))
		];
		$this->model->insert($tomorrow);
		// die(var_dump($tomorrow));
		redirect('belanja');
	}

	public function laporanMedis()
	{
		//load model rekam medis
		$this->load->model('Rekam_medisModel','rekam');

		//keyword
		$data['keyword'] = null;


		//config pagination
		$this->db->order_by('waktu');//like('waktu',$data['keyword']);
		$this->db->from('rekam_medis','DESC');
    	$config['base_url'] = 'http://localhost/KlinikPratama/belanja/laporanMedis/';
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 3;
		// die(var_dump($config['total_rows']));
		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['medis'] = $this->rekam->getSortedRekam($config['per_page'],$data['start'],$data['keyword']);
		//load view
		$this->load->view('belanja/laporanMedis',$data);
	}
}
