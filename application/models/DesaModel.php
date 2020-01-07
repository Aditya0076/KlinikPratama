<?php 
/**
 * 
 */
class DesaModel extends CI_Model
{
	private const TABLE_NAME = "desa";
	
	public function insert($desa)
	{
		$this->db->insert($this::TABLE_NAME, $desa);
	}

	public function delete($kode_desa)
	{
		$this->db->where('kode_desa', $kode_desa)
				 ->delete($this::TABLE_NAME);
	}

	public function getAll()
	{
		$query = $this->db->get($this::TABLE_NAME);
		return $query;
	}

	public function getDesa($kode_desa)
	{
		$query = $this->db->where('kode_desa',$kode_desa)
						  ->get($this::TABLE_NAME)
						  ->row_array();
		return $query;
	}

	public function update($desa)
	{
		$this->db->replace($this::TABLE_NAME, $desa);
	}
}