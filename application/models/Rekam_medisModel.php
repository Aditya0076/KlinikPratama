<?php 
/**
 * 
 */
class Rekam_medisModel extends CI_Model
{
	
	private const TABLE_NAME = "rekam_medis";
	public function insert($rekam_medis)
	{
		$this->db->insert($this::TABLE_NAME, $rekam_medis);
	}

	public function delete($kode_rekam)
	{
		$this->db->where('kode_rekam', $kode_rekam)
				 ->delete($this::TABLE_NAME);
	}

	public function getAll()
	{
		$query = $this->db->get($this::TABLE_NAME)->result_array();;
		return $query;
	}

	public function getPasien(){
		$query=$this->db->select ('*')
						->from('data_pasien')
						->join('kepala_keluarga','kepala_keluarga.kode_keluarga = data_pasien.kode_keluarga')
						->get()
						->result_array();
		return $query;
	}

	public  function  getPasienByKode($kode_pasien){
		$query = $this->db->select ('*') -> from ('data_pasien') -> join('kepala_keluarga','kepala_keluarga.kode_keluarga = data_pasien.kode_keluarga')
						  ->where('kode_pasien',$kode_pasien)
						  ->get()
			              ->row_array();
		return $query;
	}

	public  function  getRekam($kode_rekam){
		$query = $this->db->select('*')->from($this::TABLE_NAME)
							->join('data_pasien','data_pasien.kode_pasien = rekam_medis.kode_pasien')
							->where('kode_rekam',$kode_rekam)
							->get()
			                ->row_array();
		return $query;

	}

	public function getRekamByKode($kode_pasien){
		$query = $this->db->where('kode_pasien',$kode_pasien)
						  ->get($this::TABLE_NAME)
						  ->result_array();
		return $query;
	}

	public function update($rekam_medis)
	{
		$this->db->replace($this::TABLE_NAME, $rekam_medis);
	}
}
