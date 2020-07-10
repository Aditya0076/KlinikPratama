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
		$query = $this->db->select ('*') 
						  -> from ('data_pasien') 
						  ->join('kepala_keluarga','kepala_keluarga.kode_keluarga = data_pasien.kode_keluarga')
						  ->where('kode_pasien',$kode_pasien)
						  ->get()
			              ->row_array();
		return $query;
	}

	public function getTotalPemasukan($date){
		// die(var_dump($date));
		$query = $this->db->select('(select sum(rekam_medis.biaya) from rekam_medis where waktu = "' . $date . '") as biaya',FALSE)->get()->row_array();
		
		return $query['biaya'];
	}

	public  function  getRekam($kode_rekam){
		$query = $this->db->select('*')->from($this::TABLE_NAME)
							->join('data_pasien','data_pasien.kode_pasien = rekam_medis.kode_pasien')
							->where('kode_rekam',$kode_rekam)
							->get()
			                ->row_array();
		return $query;

	}

	public function getRekamByKode($limit, $start, $kode_pasien){
		$query = $this->db->where('kode_pasien',$kode_pasien)
						  ->get($this::TABLE_NAME,$limit,$start)
						  ->result_array();
		return $query;
	}

	public function getSortedRekam($limit,$start,$date){
		$query = $this->db//->from($this::TABLE_NAME)
						  ->join('data_pasien','data_pasien.kode_pasien = rekam_medis.kode_pasien')
						  ->join('kepala_keluarga','kepala_keluarga.kode_keluarga = data_pasien.kode_keluarga')
						  ->join('dusun','dusun.kode_dusun = kepala_keluarga.kode_dusun')
						  ->order_by('waktu','DESC')
						  ->get($this::TABLE_NAME,$limit,$start)
						  ->result_array();
		return $query;
	}

	public function getRekamByDate($date){
		$query = $this->db->where('waktu',$date)
						  ->get($this::TABLE_NAME)
						  ->result_array();
		return $query;
	}

	public function update($rekam_medis,$kode_rekam)
	{
		$this->db->from('rekam_medis')
				 ->where('kode_rekam',$kode_rekam)
				 ->set($rekam_medis)
				 ->update();
	}
}
