<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posisi extends Auth_Controller 

{

	public function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{

		$data['dataPosisi'] = $this->M_posisi->fetchMemberDataPosisi();

		$this->template->views('posisi/home', $data);
	}


	public function fetchMemberDataPosisi() 
	{
		$result = array('data' => array());

		$data = $this->M_posisi->fetchMemberDataPosisi();
		foreach ($data as $key => $value) {

			// button
			$buttons = '
			<div class="" style="">
				<a type="button" class="btn btn-xs bg-danger" onclick="removeMemberPosisi(\''.$value['id_posisi'].'\')" data-toggle="modal" data-target="#removeMemberModalPosisi">Hapus</a>
				<a type="button" class="btn btn-xs bg-warning" onclick="editMemberPosisi(\''.$value['id_posisi'].'\')" data-toggle="modal" data-target="#editMemberModalPosisi">Ubah</a>
			</div>
			';

			$result['data'][$key] = array(
				$value['nama_posisi'],
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}

	public function getSelectedMemberInfoPosisi($id) 
	{
		if($id) {
			$data = $this->M_posisi->fetchMemberDataPosisi($id);
			echo json_encode($data);
		}
	}

	public function createPosisi() 
	{

		$validator = array('success' => false, 'messages' => array());

		$config = array(
			array(
				'field' => 'nama_posisi',
				'label' => 'Nama Posisi',
				'rules' => 'trim|required'
			)
		);

		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

		if($this->form_validation->run() === true) {

			$createMemberPosisi = $this->M_posisi->createPosisi(); 

			if($createMemberPosisi === true) {
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

	public function editPosisi($id = null) 
	{
		if($id) {
			$validator = array('success' => false, 'messages' => array());

			$config = array(
				array(
					'field' => 'editNama_posisi',
					'label' => 'Nama Posisi',
					'rules' => 'trim|required'
				)
			);

			$this->form_validation->set_rules($config);
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

			if($this->form_validation->run() === true) {

				$editMemberPosisi = $this->M_posisi->editPosisi($id); 

				if($editMemberPosisi === true) {
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

	public function removePosisi($id = null)
	{
		if($id) {
			$validator = array('success' => false, 'messages' => array());

			$removeMemberPosisi = $this->M_posisi->removePosisi($id);
			if($removeMemberPosisi === true) {
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
		$result = $this->M_posisi->fetchMemberDataPosisi();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 
		
			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, 'Id'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, 'Nama Posisi'); 
			$rowCount++; 


		foreach ($result as $value) {

			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value['id_posisi']); 
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value['nama_posisi']); 
			$rowCount++; 

		}

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/posisi.xlsx'); // auto save 
		$this->load->helper('download');
		force_download('./assets/excel/posisi.xlsx',null); // download options
	}
}

?>