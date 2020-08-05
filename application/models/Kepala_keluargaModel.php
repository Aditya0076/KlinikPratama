<?php
 
class Kepala_keluargaModel extends CI_Model
{
	private const TABLE_NAME = "kepala_keluarga";

	public function insert($kepala_keluarga)
	{
		$this->db->insert($this::TABLE_NAME, $kepala_keluarga);
	}

	public function delete($kode_keluarga)
	{
		$this->db->where('kode_keluarga',$kode_keluarga)
				 ->delete($this::TABLE_NAME);
	}

	public function getAll()
	{
		$query = $this->db->select('*')
						  ->from($this::TABLE_NAME)
						  ->join('dusun','dusun.kode_dusun = kepala_keluarga.kode_dusun')
						  ->join('desa','desa.kode_desa = dusun.kode_desa')
						  ->get()
						  ->result_array();
		return $query;
	}

	public function getKepalas($limit, $start, $keyword,$kode_dusun)
	{
		if($keyword){
			$this->db->like('nama_kepala',$keyword);
		}

		$query = $this->db//->join('dusun','dusun.kode_dusun = kepala_keluarga.kode_dusun')
						  //->join('desa','desa.kode_desa = dusun.kode_desa')
						  ->where('kode_dusun',$kode_dusun)
						  ->get($this::TABLE_NAME, $limit, $start)
						  ->result_array();
						   // die(var_dump($query));
		return $query;
	}

	public function getKepala($kode_keluarga)
	{
		$query = $this->db->where('kode_keluarga',$kode_keluarga)
						  ->get($this::TABLE_NAME)
						  ->row_array();
		return $query;
	}

	public function searchKepala($nama_kepala)
	{
		$query = $this->db->select('*')
						  ->from($this::TABLE_NAME)
						  ->join('dusun', 'dusun.kode_dusun = kepala_keluarga.kode_dusun')
						  ->join('desa','desa.kode_desa = dusun.kode_desa')
						  ->like('nama_kepala',$nama_kepala,'first')
						  ->get()
						  ->result_array();
		return $query;
	}

	public function update($kepala_keluarga,$kode_keluarga)
	{
		$this->db->from('kepala_keluarga')
				 ->where('kode_keluarga',$kode_keluarga)
				 ->set($kepala_keluarga)
				 ->update();
	}

	public function getDusun()
	{
		$query = $this->db->select('*')
						  ->from('dusun')
						  ->join('desa','desa.kode_desa = dusun.kode_desa')
						  ->get()
						  ->result_array();
		return $query;
	}
}
