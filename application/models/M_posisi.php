<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_posisi extends CI_Model {

	public function fetchMemberDataPosisi($id = null) 
	{
		if($id) {
			$sql = "SELECT * FROM tb_posisi WHERE id_posisi = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM tb_posisi";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function createPosisi() 
	{
		$id_posisi = md5(date('ymdhms').rand());
		$dataPosisi = array(
			'id_posisi'   => $id_posisi,
			'nama_posisi' => $this->input->post('nama_posisi'),
		);

		$sql = $this->db->insert('tb_posisi', $dataPosisi);

		if($sql === true) {
			return true; 
		} else {
			return false;
		}
	} // /create function

	public function removePosisi($id = null) 
	{
		if($id) {
			$sql = "DELETE FROM tb_posisi WHERE id_posisi = ?";
			$query = $this->db->query($sql, array($id));

			// ternary operator
			return ($query === true) ? true : false;			
		} // /if
	}

	public function editPosisi($id = null) 
	{
		if($id) {
			$data = array(
				'nama_posisi' => $this->input->post('editNama_posisi')
			);

			$this->db->where('id_posisi', $id);
			$sql = $this->db->update('tb_posisi', $data);

			if($sql === true) {
				return true; 
			} else {
				return false;
			}
		}
			
	}
}