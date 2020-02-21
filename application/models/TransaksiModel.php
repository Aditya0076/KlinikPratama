<?php 
/**
 * 
 */
class TransaksiModel extends CI_Model
{
	
	private const TABLE_NAME = "belanja";

	public function insert($transaksi)
	{
		$this->db->insert($this::TABLE_NAME,$transaksi);
	}

	public function delete()
	{
		$this->db->where('id_transaksi',$id_transaksi)
				 ->delete($this::TABLE_NAME);
	}

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
						  ->join('data_pasien','data_pasien.kode_keluarga = belanja.kode_keluarga','right')
						  ->where('belanja.kode_keluarga',$kode_keluarga)
						  ->get()
						  ->result_array();
		return $query;
	}
}
