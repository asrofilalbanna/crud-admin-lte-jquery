<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota extends Auth_Controller 

{

	public function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{

		$data['dataKota'] = $this->M_kota->fetchMemberDataKota();

		$this->template->views('kota/home', $data);
	}


	public function fetchMemberDataKota() 
	{
		$result = array('data' => array());

		$data = $this->M_kota->fetchMemberDataKota();
		foreach ($data as $key => $value) {

			// button
			$buttons = '
			<div class="" style="">
				<a type="button" class="btn btn-xs bg-danger" onclick="removeMemberKota(\''.$value['id_kota'].'\')" data-toggle="modal" data-target="#removeMemberModalKota">Hapus</a>
				<a type="button" class="btn btn-xs bg-warning" onclick="editMemberKota(\''.$value['id_kota'].'\')" data-toggle="modal" data-target="#editMemberModalKota">Ubah</a>
			</div>
			';

			$result['data'][$key] = array(
				$value['nama_kota'],
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}

	public function getSelectedMemberInfoKota($id) 
	{
		if($id) {
			$data = $this->M_kota->fetchMemberDataKota($id);
			echo json_encode($data);
		}
	}

	public function createKota() 
	{

		$validator = array('success' => false, 'messages' => array());

		$config = array(
			array(
				'field' => 'nama_kota',
				'label' => 'Nama Kota',
				'rules' => 'trim|required'
			)
		);

		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

		if($this->form_validation->run() === true) {

			$createMemberKota = $this->M_kota->createKota(); 

			if($createMemberKota === true) {
				$validator['success'] = true;
				$validator['messages'] = "Successfully added";
			} else {
				$validator['success'] = false;
				$validator['messages'] = "Error while updating the infromation";
			}			
		} 
		else {
			$validator['success'] = false;
			foreach ($_POST as $key => $value) {
				$validator['messages'][$key] = form_error($key);	
			}			
		}

		echo json_encode($validator);
	}

	public function editKota($id = null) 
	{
		if($id) {
			$validator = array('success' => false, 'messages' => array());

			$config = array(
				array(
					'field' => 'editNama_kota',
					'label' => 'Nama Kota',
					'rules' => 'trim|required'
				)
			);

			$this->form_validation->set_rules($config);
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

			if($this->form_validation->run() === true) {

				$editMemberKota = $this->M_kota->editKota($id); 

				if($editMemberKota === true) {
					$validator['success'] = true;
					$validator['messages'] = "Successfully updated";
				} else {
					$validator['success'] = false;
					$validator['messages'] = "Error while updating the infromation";
				}			
			} 
			else {
				$validator['success'] = false;
				foreach ($_POST as $key => $value) {
					$validator['messages'][$key] = form_error($key);	
				}			
			}

			echo json_encode($validator);
		}
	}

	public function removeKota($id = null)
	{
		if($id) {
			$validator = array('success' => false, 'messages' => array());

			$removeMemberKota = $this->M_kota->removeKota($id);
			if($removeMemberKota === true) {
				$validator['success'] = true;
				$validator['messages'] = "Successfully removed";
			}
			else {
				$validator['success'] = true;
				$validator['messages'] = "Successfully removed";
			}

			echo json_encode($validator);
		}
	}		
	
	public function eksporFile(){
		include_once './assets/PHPExcel/Classes/PHPExcel.php';
		$result = $this->M_kota->fetchMemberDataKota();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 
		
			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, 'ID'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, 'Nama Kota'); 
			$rowCount++; 


		foreach ($result as $value) {

			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value['id_kota']); 
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value['nama_kota']); 
			$rowCount++; 

		}

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/kota.xlsx'); 	
		$this->load->helper('download');
		force_download('./assets/excel/kota.xlsx',null);
	}

}

?>