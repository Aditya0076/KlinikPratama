<?php 
/**
 * 
 */
class PetugasModel extends CI_Model
{
	private const TABLE_NAME = "admin";
	public function insert($admin)
	{
		$this->db->insert($this::TABLE_NAME, $admin);
	}

	public function delete($username)
	{
		$this->db->where('username',$username)
				 ->delete($this::TABLE_NAME);
	}

	public function getAll()
	{
		$query = $this->db->get($this::TABLE_NAME);
		return $query;
	}

	public function update($admin)
	{
		$this->db->replace($this::TABLE_NAME,$admin);
	}
}