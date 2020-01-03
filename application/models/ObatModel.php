<?php 
/**
 * 
 */
class ObatModel extends CI_Model
{
	
	private const TABLE_NAME = "obat";
	public function insert($obat)
	{
		$this->db->insert($this::TABLE_NAME,$obat);
	}

	public function delete($id_obat)
	{
		$this->db->where('id_obat',$id_obat)->delete($this::TABLE_NAME);
	}

	public function getAll()
	{
		$query = $this->db->get($this::TABLE_NAME);
		return $query;
	}

	public function update($obat)
	{
		$this->db->replace($this::TABLE_NAME,$obat);
	}
}