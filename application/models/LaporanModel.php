<?php
class LaporanModel extends CI_Model{
	private const TABLE_NAME = "laporan";
	public function getLaporan()
	{
		$query = $this->db->get($this::TABLE_NAME)
						  ->result_array();
		return $query;
	}
}
