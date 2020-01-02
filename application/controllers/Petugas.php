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
		$this->load->view('petugas/login_petugas');
	}

	public function authenticate()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$result = $this->model->getUser($username);
		if(!$result)
		{
			$this->session->set_flashdata('failed','<div style="color: red">username not found ! </div>');
			redirect('petugas');
		}else{
			if($password == $result['password'])
			{
				$user = array(
					'username' => $username,
					'role' => $result['jabatan'],
					'logged_in' => TRUE
				);
				$this->session->set_userdata($user);
				redirect('petugas/read');

			}else
			{
				$this->session->set_flashdata('failed','<div style="color: red">Password not match ! </div>');
			die(var_dump($result));
				redirect('petugas');
			}
		}
	}

	public function read()
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