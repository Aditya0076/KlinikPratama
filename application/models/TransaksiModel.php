<?php 
/**
 * 
 */
class TransaksiModel extends CI_Model
{
	
	private const TABLE_NAME = "transaksi";

	public function getAll()
	{
		$query = $this->db->get($this::TABLE_NAME)
						  ->result_array();
		return $query;
	}
}