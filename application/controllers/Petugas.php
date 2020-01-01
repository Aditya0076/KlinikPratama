<?php 
/**
 * 
 */
class Petugas extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('PetugasModel', 'model');
	}

	public function index()
	{
		$data['petugas'] = $this->model->getAll();
		$this->load->view('petugas/read',$data);
	}

	public function create()
	{
		$this->load->view('petugas/create');
	}

	public function insert()
	{
		$nama_admin = $this->input->post('nama_admin');
		$umur = $this->input->post('umur');
		$jabatan = $this->input->post('jabatan');
		$alamat = $this->input->post('alamat');
		$username = password_hash($this->input->post('username'), PASSWORD_DEFAULT);
		$password = $this->input->post('password');

		$petugas = array(
			'nama_admin' => $nama_admin,
			'umur' => $umur,
			'jabatan' => $jabatan,
			'alamat' => $alamat,
			'username' => $username,
			'password' => $password
		);

		$this->model->insert($petugas);
		redirect('petugas');
	}
}