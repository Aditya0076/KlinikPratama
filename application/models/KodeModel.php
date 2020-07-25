<?php 
/**
 * 
 */
class kodeModel extends CI_Model
{
	private const TABLE_NAME = "kode";

	public function insert($kode){
		$this->db->insert($this::TABLE_NAME, $kode);
	}

	public function getKodeByName($nama_dusun){
		$query = $this->db->like('nama_dusun',$nama_dusun)
						  ->get('dusun')
						  ->row_array();
		return $query['kode_dusun'];
	}

	public function getKode($limit,$start,$keyword){
		if($keyword)
			$this->db->like('kode.kode_dusun',$keyword);

		$query = $this->db->select('*')
						  ->join('dusun','dusun.kode_dusun = kode.kode_dusun')
						  ->join('desa','desa.kode_desa = dusun.kode_desa')
						  ->order_by('kode_terakhir')
						  ->get($this::TABLE_NAME,$limit,$start)
						  ->result_array();
		return $query;
	}

	public function getByDusun($kode_dusun)
	{
		$query = $this->db->where('kode_dusun',$kode_dusun)
						  ->get($this::TABLE_NAME)
						  ->row_array();
		return $query;
	}

	public function update($kode,$kode_dusun)
	{
		$this->db->from($this::TABLE_NAME)
				 ->where('kode_dusun',$kode_dusun)
				 ->set($kode)
				 ->update();
	}
}
 ?>
