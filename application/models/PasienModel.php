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
						  ->from($this::TABLE_NAME)
						  ->join('kepala_keluarga', 'kepala_keluarga.kode_keluarga =  data_pasien.kode_keluarga')
						  ->get()
						  ->result_array();
		return $query;
	}

	public function update($pasien)
	{
		$this->db->replace($this::TABLE_NAME,$pasien);
	}

	public function getKepala_keluarga()
	{
		$query = $this->db->from('kepala_keluarga')
						  ->get()
						  ->result_array();
		return $query;
	}
}