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
}