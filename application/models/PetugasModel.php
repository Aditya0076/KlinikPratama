<?php 
/**
 * 
 */
class PetugasModel extends CI_Model
{
	public const TABLE_NAME = "admin";
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

	public function getUser($username)
	{

			$query = $this->db->where('username',$username)
						  ->get($this::TABLE_NAME)
						  ->row_array();

			return $query;
	}

	public function delete($username)
	{
		$this->db->where('username',$username)->delete($this::TABLE_NAME);
	}
}
