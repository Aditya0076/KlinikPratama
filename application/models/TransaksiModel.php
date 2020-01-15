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
						  ->join('kepala_keluarga','kepala_keluarga.kode_keluarga = transaksi.kode_keluarga', 'left')
						  ->join('data_pasien','data_pasien.kode_keluarga = kepala_keluarga.kode_keluarga', 'left')
						  ->where('transaksi.kode_keluarga',$kode_keluarga)
						  ->get()
						  ->result_array();
		return $query;
	}

	public function insert($transaksi)
	{
		$this->db->insert($this::TABLE_NAME,$transaksi);
	}
}