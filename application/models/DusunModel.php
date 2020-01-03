<?php 
/**
 * 
 */
class DusunModel extends CI_Model
{
	
	private const TABLE_NAME = "dusun";

	public function insert($dusun)
	{
		$this->db->insert($this::TABLE_NAME, $dusun);
	}

	public function delete($kode_dusun)
	{
		$this->db->where('kode_dusun',$kode_dusun)
				 ->delete($this::TABLE_NAME);
	}

	public function getAll()
	{
		$query = $this->db->get($this::TABLE_NAME);
		return $query;
	}

	public function update($dusun)
	{
		$this->db->replace($this::TABLE_NAME, $dusun);
	}

	public function getDesa()
	{
		$query = $this->db->get('desa')
						  ->result_array();
		return $query;
	}
}