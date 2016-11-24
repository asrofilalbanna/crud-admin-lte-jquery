<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends Auth_Controller 

{

	public function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{

		$data['dataPegawai'] = $this->M_pegawai->fetchMemberDataPegawai();
		$data['dataKota']    = $this->M_kota->fetchMemberDataKota();
		$data['dataPosisi']  = $this->M_posisi->fetchMemberDataPosisi();
		$this->template->views('pegawai/home', $data);
	}


	public function fetchMemberDataPegawai() 
	{
		$result = array('data' => array());

		$data = $this->M_pegawai->fetchMemberDataPegawai();
		foreach ($data as $key => $value) {

			// button
			$buttons = '
			<div class="" style="">
				<a type="button" class="btn btn-xs bg-danger" onclick="removeMemberPegawai(\''.$value['id_pegawai'].'\')" data-toggle="modal" data-target="#removeMemberModalPegawai">Hapus</a>
				<a type="button" class="btn btn-xs bg-warning" onclick="editMemberPegawai(\''.$value['id_pegawai'].'\')" data-toggle="modal" data-target="#editMemberModalPegawai">Ubah</a>
			</div>
			';

			$result['data'][$key] = array(
				$value['nama_pegawai'],
				$value['tlp_pegawai'],
				$value['kelamin'],
				$value['nama_kota'],
				$value['nama_posisi'],
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}

	public function getSelectedMemberInfoPegawai($id) 
	{
		if($id) {
			$data = $this->M_pegawai->fetchMemberDataPegawai($id);
			echo json_encode($data);
		}
	}

	public function createPegawai() 
	{

		$validator = array('success' => false, 'messages' => array());

		$config = array(
			array(
				'field' => 'nama_pegawai',
				'label' => 'Nama Pegawai',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'tlp_pegawai',
				'label' => 'Telepon Pegawai',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'id_jk',
				'label' => 'Jenis Kelamin',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'id_kota',
				'label' => 'Kota',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'id_posisi',
				'label' => 'Posisi',
				'rules' => 'trim|required'
			)
		);

		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

		if($this->form_validation->run() === true) {

			$createMemberPegawai = $this->M_pegawai->createPegawai(); 

			if($createMemberPegawai === true) {
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

	public function editPegawai($id = null) 
	{
		if($id) {
			$validator = array('success' => false, 'messages' => array());

			$config = array(
				array(
					'field' => 'editNama_pegawai',
					'label' => 'Nama Pegawai',
					'rules' => 'trim|required'
				),
				array(
					'field' => 'editTlp_pegawai',
					'label' => 'Telepon Pegawai',
					'rules' => 'trim|required'
				)
			);

			$this->form_validation->set_rules($config);
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

			if($this->form_validation->run() === true) {

				$editMemberPegawai = $this->M_pegawai->editPegawai($id); 

				if($editMemberPegawai === true) {
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

	public function removePegawai($id = null)
	{
		if($id) {
			$validator = array('success' => false, 'messages' => array());

			$removeMemberPegawai = $this->M_pegawai->removePegawai($id);
			if($removeMemberPegawai === true) {
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
		$result = $this->M_pegawai->fetchMemberDataPegawai();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 
		
		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, 'Id'); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, 'Nama Pegawai'); 
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, 'Telepon');
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, 'Jenis Kelamin');
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, 'Alamat');
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, 'Posisi');
		$rowCount++; 


		foreach ($result as $value) {

			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value['id_pegawai']); 
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value['nama_pegawai']); 
			$objPHPExcel->getActiveSheet()->setCellValueExplicit('C'.$rowCount, $value['tlp_pegawai'],PHPExcel_Cell_DataType::TYPE_STRING); 
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value['kelamin']); 
			$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value['nama_kota']); 
			$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value['nama_posisi']); 
			$rowCount++; 

		}

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/pegawai.xlsx'); // auto save 
		$this->load->helper('download');
		force_download('./assets/excel/pegawai.xlsx',null); // download options
	}

}

?>