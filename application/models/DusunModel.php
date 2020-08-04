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

	public function getAll($limit, $start, $keyword = null)
	{
		if($keyword)
			$this->db->like('nama_dusun', $keyword);

		$query = $this->db->join('desa','desa.kode_desa = dusun.kode_desa')
						  ->order_by('kode_dusun','DESC')
						  ->get($this::TABLE_NAME,$limit,$start)
						  ->result_array();;
		return $query;
	}

	public function getDusun($kode_dusun)
	{
		$query = $this->db->where('kode_dusun',$kode_dusun)
						  ->join('desa','desa.kode_desa = dusun.kode_desa')
						  ->get($this::TABLE_NAME)
						  ->row_array();
		return $query;
	}

	public function getDusunByName($nama_dusun, $column)
	{
		$query = $this->db->select('*')
					 	  ->from($this::TABLE_NAME)
					 	  ->like($column,$nama_dusun)
					 	  ->get()
					 	  ->result_array();

//		$result = array();
		foreach ($query as $query){
			$result[] = array(
				//array(
				'label' => $query['nama_dusun'],
				'value' => $query['kode_dusun']//)
			);
		}

//		die(var_dump($result));
		return $result;
	}

	public function getSimbolByKode($kode_dusun)
	{
		$query = $this->db->select('simbol')
						  ->where('kode_dusun',$kode_dusun)
						  ->get($this::TABLE_NAME)
						  ->row_array();
		return $query['simbol'];
	}

	public function update($dusun,$kode_dusun)
	{
		$this->db->from($this::TABLE_NAME)
				 ->where('kode_dusun',$kode_dusun)
				 ->set($dusun)
				 ->update();
	}

	public function getDesa()
	{
		$query = $this->db->get('desa')
						  ->result_array();
		return $query;
	}
}
