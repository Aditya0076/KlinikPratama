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

		if($message=$this->validate($obat)){
			$this->session->set_flashdata('gagal','<div>Data <span style="color:red"> ' . $message . '</span> kosong, mohon disi terlebih dahulu<div>');
			redirect('obat/create');
		}else{
			$this->model->insert($obat);
			$this->session->set_flashdata('create','<div stlye="color: blue">Data berhasil ditambahkan</div>');
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
		$nama_obat = $this->input->post('nama_obat');
		$jenis_obat = $this->input->post('jenis_obat');
		$jumlah_obat = $this->input->post('jumlah_obat');

		$obat = array(
			'id_obat' => $id_obat,
			'nama_obat' => $nama_obat,
			'jenis_obat' => $jenis_obat,
			'jumlah_obat' => $jumlah_obat
		);

		if($message=$this->validate($obat)){
			$this->session->set_flashdata('gagal','<div>Data <span style="color:red"> ' . $message . '</span> kosong, mohon disi terlebih dahulu<div>');
			redirect('obat/update' . $id_obat);
		}else{
			$this->model->update($obat);
			$this->session->set_flashdata('update','<div stlye="color: blue">Data berhasil diedit</div>');
			redirect('obat');
		}
	}

	public function delete($id_obat)
	{
		$this->model->delete($id_obat);
		$this->session->set_flashdata('create','<div stlye="color: blue">Data berhasil dihapus</div>');
		redirect('obat');
	}

	public function validate($obat)
	{
		$name = array(
			'id_obat' => 'Kode Obat',
			'nama_obat' => 'Nama obat',
			'jenis_obat' => 'Jenis obat',
			'jumlah_obat' => 'Jumlah obat'
		);

		$message = "";
		foreach ($obat as $key => $value) {
			if(!$value){
				if(!$message){
					foreach ($name as $name => $n_value) {
						if(!strcmp($key,$name))
							$message = $n_value;
					}
				}
				else{
					foreach ($name as $name => $n_value) {
						if(!strcmp($key,$name))
							$message = $message . ', ' . $n_value;  
					}
				}
			}
		}
		return $message;
	}
}
