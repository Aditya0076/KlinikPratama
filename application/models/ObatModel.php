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
		$this->db->where('id_obat',$id_obat)
				 ->delete($this::TABLE_NAME);
	}

	public function getAll()
	{
		$query = $this->db->get($this::TABLE_NAME)
						  ->result_array();
		return $query;
	}

	public function getObats($limit, $start, $keyword = null){
		if($keyword)
			$this->db->like('nama_obat',$keyword);
		$query = $this->db->get($this::TABLE_NAME, $limit, $start)
						  ->result_array();
		return $query;

	}

	public function getObat($id_obat)
	{
		$query = $this->db->where('id_obat',$id_obat)
						  ->get($this::TABLE_NAME)
						  ->row_array();
		return $query;
	}

	public function update($obat)
	{
		$this->db->from('obat')
				 ->where('id_obat',$id_obat)
				 ->set($obat)
				 ->update();
	}
}