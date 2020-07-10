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

	public function detail($date, $jenis_laporan)
	{
		if(!strcmp($jenis_laporan,'pemasukan')){
			$this->load->model('Rekam_medisModel','rekam');
			$data['rekam'] = $this->rekam->getRekamByDate($date);
			$this->load->view('laporan/detail_pemasukan',$data);
		}else{
			$this->load->model('belanjaModel','belanja');
			$data['belanja'] = $this->belanja->getBelanjaByDate($date);
			$this->load->view('laporan/detail_pengeluaran',$data);
		}
	}
}
