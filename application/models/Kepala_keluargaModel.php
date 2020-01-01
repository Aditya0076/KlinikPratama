<?php 
/**
 * 
 */
class Kepala_keluargaModel extends CI_Model
{
	private const TABLE_NAME = "kepala_keluarga";

	public function insert($kepala_keluarga)
	{
		$this->db->insert($this::TABLE_NAME, $kepala_keluarga);
	}

	public function delete($kode_keluarga)
	{
		$this->db->where('kode_keluarga',$kode_keluarga)
				 ->delete($this::TABLE_NAME);
	}

	public function getAll()
	{
		$query = $this->db->get($this::TABLE_NAME);
		return $query;
	}

	public function update($kepala_keluarga)
	{
		$this->db->replace($this::TABLE_NAME, $kepala_keluarga);
	}
}
