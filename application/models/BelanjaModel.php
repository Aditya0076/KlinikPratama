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

	public function getRiwayat(){
		$query = $this->db->select('waktu','biaya')
						  ->from('rekam_medis')
						  ->get(group_by('waktu'))
						  ->result_array();
		return $query;
	}

	public function getBelanja()
	{
		$query = $this->db->get($this::TABLE_NAME)
						  			 ->result_array();

		return $query;
	}

	public function getBelanjas($limit, $start, $keyword = null){
		if($keyword)
			$this->db->like('waktu', $keyword);
		$query = $this->db->get($this::TABLE_NAME, $limit, $start)
						  ->result_array();
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