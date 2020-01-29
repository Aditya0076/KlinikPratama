<?php
class Desa extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('DesaModel', 'model');
	}

	public function index()
	{
		$this->load->view('desa/create');
	}

	public function insert()
	{
		$nama_desa = $this->input->post('nama_desa');
		$desa = array('nama_desa' => $nama_desa);

		if($message=$this->validate($desa)){
			$this->session->set_flashdata('gagal','<div>Data <span style="color:red"> ' . $message . '</span> kosong, mohon disi terlebih dahulu<div>');
			redirect('desa');
		}else{
			$this->model->insert($desa);
			$this->session->set_flashdata('create','<div stlye="color: blue">Data berhasil ditambahkan</div>');
			redirect('desa');
		}
	}

	public function update($kode_desa)
	{
		$data['pasien'] = $this->model->getDesa($kode_desa);
		$this->load->view('desa/update',$data);
	}

	public function replace()
	{
		$kode_desa = $this->input->post('kode_desa');
		$nama_desa = $this->input->post('nama_desa');

		$desa = array(
			'kode_desa' => $kode_desa,
			'nama_desa' => $nama_desa
		);

		if($message=$this->validate($desa)){
			$this->session->set_flashdata('gagal','<div>Data <span style="color:red"> ' . $message . '</span> kosong, mohon disi terlebih dahulu<div>');
			redirect('desa/update' . $kode_desa);
		}else{
			$this->model->update($desa);
			$this->session->set_flashdata('update','<div stlye="color: blue">Data berhasil diedit</div>');
			redirect('desa');
		}
	}

	public function delete($kode_desa)
	{
		$this->model->delete($kode_desa);
		redirect('desa');
	}

	public function validate($desa)
	{
		$name = array(
			'kode_desa' => 'Kode desa',
			'nama_desa' => 'Nama desa'
		);

		$message = "";
		foreach ($desa as $key => $value) {
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