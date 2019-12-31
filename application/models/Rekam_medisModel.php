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
		$query = $this->db->get($this::TABLE_NAME);
		return $query;
	}

	public function update($rekam_medis)
	{
		$this->db->replace($this::TABLE_NAME, $rekam_medis);
	}
}