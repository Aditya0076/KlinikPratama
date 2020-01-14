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

	public function getPasienonKeluarga($kode_keluarga)
	{
		$query = $this->db->select('*')
						  ->from($this::TABLE_NAME)
						  ->join('kepala_keluarga','kepala_keluarga.kode_keluarga = transaksi.kode_keluarga')
						  ->join('data_pasien','data_pasien.kode_keluarga = kepala_keluarga.kode_keluarga')
						  ->where('kode_keluarga',$kode_keluarga)
						  ->get()
						  ->result_array();
		return $query;
	}
}