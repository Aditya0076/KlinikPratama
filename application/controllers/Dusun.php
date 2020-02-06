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

	/*public function index()
	{
		// $data['dusun'] = $this->model->getAll();
		$this->load->view('dusun/create',$data);
	}*/

	public function index()
	{
		$data['desa'] = $this->model->getDesa();
		$this->load->view('dusun/create',$data);
	}

	public function insert()
	{
		$nama_dusun = $this->input->post('nama_dusun');
		$kode_desa = $this->input->post('kode_desa');

		$dusun = array(
			'nama_dusun' => $nama_dusun,
			'kode_desa' => $kode_desa,
		);

		$this->form_validation->set_rules('nama_dusun','Nama Dusun','required');
		$this->form_validation->set_rules('kode_desa','Kode Desa','required');
		
		if ($this->form_validation->run()== FALSE){
			redirect('dusun');
		}else{
			$this->model->insert($dusun);
			redirect('dusun');
		}
	}

	public function update($kode_dusun)
	{
		$data['dusun'] = $this->model->getDusun($kode_dusun);
		$this->load->view('dusun/read',$data);
	}

	public function replace()
	{
		$kode_dusun = $this->input->post('kode_dusun');
		$nama_dusun = $this->input->post('nama_dusun');
		$kode_desa = $this->input->post('kode_desa');

		$dusun = array(
			'kode_dusun' => $kode_dusun,
			'nama_dusun' => $nama_dusun,
			'kode_desa' => $kode_desa,
		);

		$this->form_validation->set_rules('nama_dusun','Nama Dusun','required');
		$this->form_validation->set_rules('kode_desa','Kode Desa','required');
		$this->form_validation->set_rules('kode_desa','Nama Desa','required');
		
		if ($this->form_validation->run() == FALSE){
			redirect('dusun/update/' . $kode_dusun);
		}else{
			$this->model->update($dusun);
			redirect('dusun');
		}
}

	public function delete($kode_dusun)
	{
		$this->model->delete($kode_dusun);
		$this->session->set_flashdata('delete','<div stlye="color: blue">Data berhasil dihapus</div>');
		redirect('dusun');
	}


	public function validate($dusun)
	{
		$name = array(
			'kode_dusun' => 'Kode dusun',
			'nama_dusun' => 'Nama dusun',
			'kode_desa' => 'Nama desa'
		);

		$message = "";
		foreach ($dusun as $key => $value) {
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
