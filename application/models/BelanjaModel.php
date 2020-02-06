<?php 
/**
 * 
 */
class BelanjaModel extends CI_Model
{
	private const TABLE_NAME = "belanja";

	public function insert($belanja)
	{
		$this->db->insert($this::TABLE_NAME, $belanja);
	}

	public function delete($kode_belanja)
	{
		$this->db->where('kode_belanja',$kode_belanja)
				 ->delete($this::TABLE_NAME);
	}

	public function getAll()
	{
		$query = $this->db->select('*')
						  ->from($this::TABLE_NAME)
						  ->join('rekam_medis','rekam_medis.waktu = belanja.waktu')
						  ->get()
						  ->result_array();
						  // $query = $this->db->get($this::TABLE_NAME)->result_array();
						  die(var_dump($query));
		return $query;
	}

	public function getByKode($kode_belanja)
	{
		$query = $this->db->where('kode_belanja',$kode_belanja)
						  ->get($this::TABLE_NAME)
						  ->row_array();
		return $query;
	}

	public function update($belanja)
	{
		$this->db->replace($this::TABLE_NAME,$belanja);
	}
}