<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kota extends CI_Model {

	public function fetchMemberDataKota($id = null) 
	{
		if($id) {
			$sql = "SELECT * FROM tb_kota WHERE id_kota = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM tb_kota";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function createKota() 
	{
		$id_kota = md5(date('ymdhms').rand());
		$dataKota = array(
			'id_kota'   => $id_kota,
			'nama_kota' => $this->input->post('nama_kota'),
		);

		$sql = $this->db->insert('tb_kota', $dataKota);

		if($sql === true) {
			return true; 
		} else {
			return false;
		}
	} // /create function

	public function removeKota($id = null) 
	{
		if($id) {
			$sql = "DELETE FROM tb_kota WHERE id_kota = ?";
			$query = $this->db->query($sql, array($id));

			// ternary operator
			return ($query === true) ? true : false;			
		} // /if
	}

	public function editKota($id = null) 
	{
		if($id) {
			$data = array(
				'nama_kota' => $this->input->post('editNama_kota')
			);

			$this->db->where('id_kota', $id);
			$sql = $this->db->update('tb_kota', $data);

			if($sql === true) {
				return true; 
			} else {
				return false;
			}
		}
			
	}

	public function total_rows() {
		$data = $this->db->get('tb_kota');

		return $data->num_rows();
	}
}