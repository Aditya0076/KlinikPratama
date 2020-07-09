<?php
class Laporan extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('LaporanModel','model');
	}

	public function index()
	{
		$data['laporan'] = $this->model->getLaporan();
		$this->load->view('laporan/read',$data);
	}

	public function detail($jenis_laporan)
	{
		if(!strcmp($jenis_laporan,'pemasukan')){

		}
	}
}
