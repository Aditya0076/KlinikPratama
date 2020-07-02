<?php 
/**
 * 
 */
class PasienModel extends CI_Model
{
	
	private const TABLE_NAME = "data_pasien";
	public function insert($pasien)
	{
		$this->db->insert($this::TABLE_NAME,$pasien);
	}

	public function delete($kode_pasien)
	{
		$this->db->where('kode_pasien',$kode_pasien)
				 ->delete($this::TABLE_NAME);
	}

	public function getAll()
	{
		$query = $this->db->select('*')
						  ->join('kepala_keluarga', 'kepala_keluarga.kode_keluarga =  data_pasien.kode_keluarga')
						  ->get($this::TABLE_NAME)
						  ->result_array();
		return $query;
	}

	public function getPasiens($limit, $start, $keyword = null)
	{
		if($keyword){
			$this->db->like('nama_pasien',$keyword);
		}
		$query = $this->db->select('*')
						  ->join('kepala_keluarga','kepala_keluarga.kode_keluarga = data_pasien.kode_keluarga')
						  ->get($this::TABLE_NAME,$limit,$start)
						  ->result_array();
		return $query;
	}

	public function getPasien($kode_pasien)
	{
		$query = $this->db->select('*')
						  ->join('kepala_keluarga','kepala_keluarga.kode_keluarga = data_pasien.kode_keluarga')
						  ->where('data_pasien.kode_pasien',$kode_pasien)
						  ->get($this::TABLE_NAME)
						  ->row_array();
		return $query;
	}

	public function countAllPasien()
	{
		$query = $this->db->get($this::TABLE_NAME)
						  ->num_rows();
		return $query;
	}

	public function searchPasien($nama_pasien)
	{
		$query = $this->db->select('*')
						  ->join('kepala_keluarga','kepala_keluarga.kode_keluarga = data_pasien.kode_keluarga')
						  ->like('nama_pasien',$nama_pasien,'after')
						  ->get($this::TABLE_NAME)
						  ->result_array();
		return $query;
	}

	public function update($pasien,$kode_pasien)
	{
		$this->db->from('data_pasien')
				 ->where('kode_pasien',$kode_pasien)
				 ->set($pasien)
				 ->update();
	}

	public function getKepala_keluarga()
	{
		$query = $this->db->from('kepala_keluarga')
						  ->get()
						  ->result_array();
		return $query;
	}
}