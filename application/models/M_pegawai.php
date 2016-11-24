<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {	

	public function fetchMemberDataPegawai($id = null) 
	{
		if($id) {
			$sql = "SELECT * FROM tb_pegawai WHERE id_pegawai = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * 
				FROM tb_pegawai pgw, tb_jk jk, tb_kota kot, tb_posisi pos
				WHERE 
				pgw.id_jk = jk.id_jk AND 
				pgw.id_kota = kot.id_kota AND
				pgw.id_posisi = pos.id_posisi
				";

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function createPegawai() 
	{
		$id_pegawai = md5(date('ymdhms').rand());
		$dataPegawai = array(
			'id_pegawai'   => $id_pegawai,
			'nama_pegawai' => $this->input->post('nama_pegawai'),
			'tlp_pegawai'  => $this->input->post('tlp_pegawai'),
			'id_jk' 	   => $this->input->post('id_jk'),
			'id_kota'      => $this->input->post('id_kota'),
			'id_posisi'    => $this->input->post('id_posisi'),
			'ket'          => '1'
		);

		$sql = $this->db->insert('tb_pegawai', $dataPegawai);

		if($sql === true) {
			return true; 
		} else {
			return false;
		}
	} // /create function

	public function removePegawai($id = null) 
	{
		if($id) {
			$sql = "DELETE FROM tb_pegawai WHERE id_pegawai = ?";
			$query = $this->db->query($sql, array($id));

			// ternary operator
			return ($query === true) ? true : false;			
		} // /if
	}

	public function editPegawai($id = null) 
	{
		if($id) {
			$data = array(
				'nama_pegawai' => $this->input->post('editNama_pegawai'),
				'tlp_pegawai'  => $this->input->post('editTlp_pegawai'),
				'id_jk' 	   => $this->input->post('editId_jk'),
				'id_kota'      => $this->input->post('editId_kota'),
				'id_posisi'    => $this->input->post('editId_posisi')
			);

			$this->db->where('id_pegawai', $id);
			$sql = $this->db->update('tb_pegawai', $data);

			if($sql === true) {
				return true; 
			} else {
				return false;
			}
		}
			
	}

	public function getJlmh($id)
	{
		$sql = "SELECT count(*) as jml FROM tb_pegawai WHERE id_jk = $id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}