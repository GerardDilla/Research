<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {


	function __construct() 
	{
		  parent::__construct();
		  $this->load->library('form_validation');
		  $this->load->helper(array('form', 'url'));
		  //load file helper
		  $this->load->helper('file');
		  $this->load->model('Process_Model');
		  $this->load->model('Account_model');
		  $this->load->library('custom_presets');
		  $this->usertypes = $this->custom_presets->usertypes();

		  //Sets Timezone for
		  date_default_timezone_set('Asia/Manila');

		  //Defines log date
		  $this->now = new DateTime();
		  $this->logdatetime =  $this->now->format('Y-m-d H:i:s');
		  $this->logdate = date("Y/m/d");

	}
	public function index(){

		/* For Debugging --- 
		echo $this->session->userdata('LoginData')['Fullname'];
		echo '<hr>';
		echo $this->session->userdata('LoginData')['ID'];
		echo '<hr>';
		echo $this->session->userdata('LoginData')['Usertype'];
		*/
		$this->Layout('Management');
		
	}
	public function AjaxGetCategories(){

		$input = array(
			'searchkey' => $this->input->get_post('searchkey')
		);
		$categories = $this->Process_Model->categorylist($input);
		echo json_encode($categories);

	}
	public function AjaxGetDepartment(){

		$departments = $this->Process_Model->departmentlist();
		echo json_encode($departments);

	}
	public function AjaxGetFiles(){

		$filters = $this->input->post('filters');
		$files = $this->Process_Model->filelist($filters);
		echo json_encode($files);

	}
	public function AjaxGetAccounts(){

		$input = array(
			'searchkey' => $this->input->get_post('searchkey')
		);
		$accounts = $this->Account_model->GetAccounts($input);
		echo json_encode($accounts);

	}
	public function AjaxGetExternalAccounts(){

		$input = array(
			'searchkey' => $this->input->get_post('searchkey')
		);
		$accounts = $this->Account_model->GetExternalAccounts($input);
		echo json_encode($accounts);

	}
	public function AjaxGetAccountDetails(){

		$input = array(
			'id' => $this->input->get_post('id')
		);
		$accounts = $this->Account_model->AccountDetails($input);
		echo json_encode($accounts);

	}
	public function AjaxGetExternalAccountDetails(){

		$input = array(
			'id' => $this->input->get_post('id')
		);
		$accounts = $this->Account_model->ExternalAccountDetails($input);
		echo json_encode($accounts);

	}
	public function AjaxGetFileDetails(){

		$FileID = $this->input->post('FileID');
		$files = $this->Process_Model->filedetails($FileID);
		echo json_encode($files);
		
	}
	public function AjaxGetCategoryDetails(){

		$CategoryID = $this->input->post('CategoryID');
		$files = $this->Process_Model->CategoryDetails($CategoryID);
		echo json_encode($files);
		
	}
	public function AddPeerBulk(){
		
		$accounts = array(
			/*
			'VicenteReal' => 'Prof. Dr. Vicente C. Real',
			'HoseaMatel' => 'Prof. Dr. Hosea DL. Matel',
			'DeanWhitehead' => 'Prof. Dr. Dean Whitehead',
			'JoseBalsa-Barreiro' => 'Prof. Dr. Jose Balsa-Barreiro',
			'MohammedEl-Shazly' => 'Prof. Dr. Mohammed El-Shazly',
			'SofianEl-Astal' => 'Prof. Dr. Sofian El-Astal',
			'AugustoAguila' => 'Prof. Dr.  Augusto Aguila',
			'CyruzTuppal' => 'Prof. Dr. Cyruz P. Tuppal',
			'DaniloIsrael' => 'Prof. Dr. Danilo Israel',
			'PhilipQuizon' => 'Prof. Dr. Philip C. Quizon',
			'TrixieBowe' => 'Ms. Trixie A. Bowe',
			'AurieleBuendia' => 'Ms. Auriele Yvette C. Buendia',
			'DivinaMongaya' => 'Ms.Divina P. Mongaya',
			'CamilleMartinez' => 'Ms.Camille Joyce A. Martinez',
			'MargaritaZulueta' => 'Ms.Margarita Beatrico T. Zulueta',
			'AngelouSantiaguel' => 'Ms.Angelou S. Santiaguel',
			'RenzGumaru' => 'Prof. Renz Chester R. Gumaru',
			'EddieCabrera' => 'Mr. Eddie Cabrera',
			'MargaretMay' => 'Margaret May A. Ga, Rn, Man',
			'FranchitaAlcausin' => 'Franchita Alcausin',
			'MaryRoa' => 'Prof. Dr. Mary Nellie T. Roa',
			'KrissanHalili' => 'Mr. Krissan Aldous R. Halili',
			'BoshraArnout' => 'Prof. Dr. Boshra Ismail Ahmed Arnout',
			'HernandoBernal' => 'Prof. Dr. Hernando L. Bernal, Jr.',
			'VirgilioNicasio' => 'Prof. Virgilio Nicasio',
			'MerlieNahilat' => 'Prof. Merlie C. Nahilat',
			'JoanGenerozo' => 'Prof. Dr. Joan C. Generozo',
			'CristinaJuarez' => 'Prof. Cristina Gelpo Juarez',
			'TichieBaena' => 'Prof. Dr. Tichie Anne E. Baena',
			'IsaiasBanag' => 'Prof. Dr. Isaias Banag',
			'AdrianYrigan' => 'Prof. Adrian Yrigan',
			'JohnFaustorilla' => 'Prof. Dr. John Francis L. Faustorilla, Jr.',
			'CyruzTuppal' => 'Prof. Dr. Cyruz Tuppal',
			'JestoniManiago' => 'Prof. Dr. Jestoni Maniago',
			'HazelGuiao' => 'Prof. Hazel Guiao',
			'TeresitaPedrajas' => 'Prof. Dr. Teresita P. Pedrajas',
			'KristofferCanillas' => 'Prof. Dr. Kristoffer E. Canillas',
			'RodelFrias' => 'Prof. Rodel A. Frias',
			'BelindaLiwanag' => 'Prof. Belinda A. Liwanag',
			'ArielMagat' => 'Prof. Dr. Ariel H. Magat',
			'SarahOlivarez-Cruz' => 'Prof. Dr. Sarah Olivarez-Cruz',
			'NievesTaguilao-Salazar' => 'Prof. Dr. Nieves Taguilao-Salazar',
			'LisaCosta' => 'Prof. Dr. Lisa C. Costa',
			'MaryTepora' => 'Prof. Dr. Mary Jane O. Tepora',
			'MariaJoson' => 'Prof. Maria Eloisa M. Joson',
			'SherylFenol' => 'Prof. Sheryl D. Fenol',
			'RobertoSarreal' => 'Prof. Roberto Sarreal',
			'JenniferTorres' => 'Ms. Jennifer A. Torres',
			'KimJavenes' => 'Mr. Kim John Javenes',
			'JulieBaldonado' => 'Ms. Julie Anne Baldonado',
			'LaudimerHingada' => 'Prof. Laudimer Hingada',
			*/
			'KarenMosenda' => 'Prof. Karen Mosenda',
			'MiaBorromeo' => 'Prof. Mia Borromeo',
			'ArvinEballo' => 'Prof. Dr. Arvin Eballo',
			'AndylynSimeon' => 'Prof. Andylyn Simeon',
			'FatmahYahyHassan' => 'Prof. FatmahYahy Hassan Al-Qadimi',
			'KhadijaAbond' => 'Prof. Khadija Abond Al-Masdi',
			'RichardNecesito' => 'Prof. Richard D. Necesito',
			'WyndellGaspan' => 'Wyndell Gaspan',
			'PatricioChap-as' => 'Patricio K. Chap-as',
			'PatrocinoDeVeraII' => 'Patrocino C. De Vera II',
			'AprilAngagan' => 'April L. Angagan',
			'RancyBalitar' => 'Rancy E. Balitar',
			'SaidNasser' => 'Said Nasser Al-Harthy',
			'ManalAmur' => 'Manal Amur Al-Hanshi'
		);
		foreach($accounts as $username => $name){

			$error = '';
			$inputs = array(
				'username' => $username,
				'password' => 'sdca2019',
				'fullname' => $name
			);
			$accountCheck = $this->Account_model->AddPeerAccount($inputs);
			if(!$accountCheck){

				$error = 'Failed registration for: '.$name;

			}
			echo $username.' : '.$name.'<br>';
			
		}
		echo '<hr>';
		echo 'Errors:'.$error;
		//echo json_encode($accounts);
	}
	public function AjaxAddPeer(){

		$this->form_validation->set_rules('PeerUsername', 'Username', 'required|min_length[5]|max_length[150]');
		$this->form_validation->set_rules('PeerFullname', 'Full Name', 'required|min_length[5]|max_length[250]');
		$this->form_validation->set_rules('PeerPassword', 'Password', 'required|min_length[5]|max_length[150]');
		$this->form_validation->set_rules('PeerPassword_Retype', 'Password', 'matches[PeerPassword]');
		
		if($this->form_validation->run() == TRUE){

			$inputs = array(
				'username' => $this->input->post('PeerUsername'),
				'password' => $this->input->post('PeerPassword'),
				'fullname' => $this->input->post('PeerFullname')
			);
			$accountCheck = $this->Account_model->CheckExistingPeerAccount($inputs);
			if($accountCheck){
				
				echo 'Username Already Being Used';

			}else{

				$insertStatus = $this->Account_model->AddPeerAccount($inputs);
				if(!$insertStatus){
					echo 'Error in Creating Account';
				}else{
					echo 'Account Added';
				}

			}
			
		}else{

			echo validation_errors();

		}

	}
	public function AjaxNewFile(){

		$this->form_validation->set_rules('filename_new', 'File Name', 'required|max_length[150]');
		$this->form_validation->set_rules('author_new', 'Author', 'required|max_length[150]');
		$this->form_validation->set_rules('abstract_new', 'Description/Abstract', 'required|max_length[1000]');
		$this->form_validation->set_rules('file_category_new', 'Category', 'required');
		$this->form_validation->set_rules('file_department_new', 'Department', 'required');

		$returndata = array(
			'Error' => 0,
			'Message' => '',
			'FileID' => '',
		);

		if($this->form_validation->run() == TRUE){

			$input = array(
				'file_title' => $this->input->post('filename_new'),
				'research_author' => $this->input->post('author_new'),
				'research_description' => $this->input->post('abstract_new'),
				'rdo_category_id' => $this->input->post('file_category_new'),
				'file_upload_date' => $this->now->format('Y-m-d'),
				'department_id' => $this->input->post('file_department_new')
			);

			$insertStatus = $this->Process_Model->AddFile($input);
			if($insertStatus == TRUE){

				//Checks file input--
				if($_FILES['PDF_New_File']['error'] == 4){

					$returndata['Error'] = 1;
					$returndata['Message'] = 'No File Selected';
					echo json_encode($returndata);
					return;
				}
				//Checks file input--

				$uploadStatus = $this->UploadPDF('PDF_New_File');
				if($uploadStatus['Error'] != 1){

					$input = array(
						'FileID' => $insertStatus
					);
					$set = array(
						'file_upload_name' => $uploadStatus['FileName'],
					);
					$updateStatus = $this->Process_Model->UpdateFileDetails($input,$set);

					if($updateStatus == true){

						$returndata['Message'] = 'Entry Added!';

					}else{

						$returndata['Error'] = 1;
						$returndata['Message'] = 'An Error occured during upload';
					}

				}else{

					$returndata['Error'] = 1;
					$returndata['Message'] = 'Entry was added, but was unable to upload PDF File. <br> Try Editing the existing entry.';

				}

			}else{
				$returndata['Message'] = 'Error in Adding Entry';
			}

			echo json_encode($returndata);
		
			
		}else{

			$returndata['Error'] = 1;
			$returndata['Message'] = validation_errors();
			echo json_encode($returndata);
		}
		
	}
	public function AjaxNewCategory(){

		$this->form_validation->set_rules('CategoryName', 'Category Name', 'required|max_length[100]');
		
		$returndata = array(
			'Error' => 0,
			'Message' => '',
			'CategoryID' => '',
		);

		if($this->form_validation->run() == TRUE){

			$input = array(
				'rdo_category' => $this->input->post('CategoryName'),
				'rdo_category_publish' => 1,
				'rdo_category_active' => 1,
			);
			$insertStatus = $this->Process_Model->AddCategory($input);
			if($insertStatus == TRUE){

				$returndata['CategoryID'] = $insertStatus;
				$returndata['Message'] = 'Category Added!';

			}else{

				$returndata['Error'] = 1;
				$returndata['Message'] = 'Error in Adding Category';

			}

			echo json_encode($returndata);
		
			
		}else{

			$returndata['Error'] = 1;
			$returndata['Message'] = validation_errors();
			echo json_encode($returndata);
		}
		
	}
	public function AjaxDeactivateEntry(){

		$input = array(
			'FileID' => $this->input->post('FileID')
		);
		$set = array(
			'rdo_file_active' => 0
		);
		$returndata = array(
			'Error' => 0,
			'Message' => '',
			'FileID' => '',
		);
		$updateStatus = $this->Process_Model->UpdateFileDetails($input,$set);
		if($updateStatus == TRUE){
			$returndata = array(
				'Error' => 0,
				'Message' => 'Entry Removed'
			);
		}else{
			$returndata = array(
				'Error' => 1,
				'Message' => 'Error in Removing Entry'
			);
		}
		echo json_encode($returndata);

	}
	public function AjaxUpdateFile(){

		$this->form_validation->set_rules('FileID', 'FileID', 'required');
		$this->form_validation->set_rules('author_edit', 'Author', 'required|max_length[150]');
		$this->form_validation->set_rules('filename_edit', 'File Name', 'required|max_length[150]');
		$this->form_validation->set_rules('abstract_edit', 'Description/Abstract', 'required|max_length[1000]');
		$this->form_validation->set_rules('file_category_edit', 'Category', 'required');
		$this->form_validation->set_rules('file_department_edit', 'Department', 'required');
		
		$returndata = array(
			'Error' => 0,
			'Message' => '',
			'FileID' => '',
		);

		if($this->form_validation->run() == TRUE){

			$input = array(
				'FileID' => $this->input->post('FileID')
			);
			$returndata['FileID'] = $input['FileID'];
			
			$set = array(
				'file_title' => $this->input->post('filename_edit'),
				'research_author' => $this->input->post('author_edit'),
				'research_description' => $this->input->post('abstract_edit'),
				'rdo_category_id' => $this->input->post('file_category_edit'),
				'department_id' => $this->input->post('file_department_edit')
			);

			$updateStatus = $this->Process_Model->UpdateFileDetails($input,$set);

			if($updateStatus == TRUE){

				//PDF_Edit_File
				$FileInput = 'PDF_Edit_File';
				if($_FILES[$FileInput]['error'] !== 4){
					
					$UploadStatus = $this->UploadPDF($FileInput);
					if($UploadStatus['Error'] == 1){
						//Failed Uploading
						$returndata['Error'] = 1;
						$returndata['Message'] = $UploadStatus['Message'];

					}else{

						$namechange = array(
							'file_upload_name' => $UploadStatus['FileName'],
						);
						$updateStatus = $this->Process_Model->UpdateFileDetails($input,$namechange);
						if($updateStatus == true){

							$returndata['Message'] = 'File Updated!';

						}else{

							$returndata['Message'] = 'Failed to update filename. Contact MIS for support.';

						}
						

					}

				}else{

					$returndata['Message'] = 'File Updated!';
					
				}

				

			}else{
				$returndata['Message'] = 'Error in Updating File';
			}

			echo json_encode($returndata);
		
			
		}else{

			$returndata['Error'] = 1;
			$returndata['Message'] = validation_errors();
			echo json_encode($returndata);
		}


		
	}
	public function AjaxUpdateCategory(){

		$this->form_validation->set_rules('CategoryID', 'Category ID', 'required');
		$this->form_validation->set_rules('CategoryName', 'Category Name', 'required|max_length[100]');
		
		$returndata = array(
			'Error' => 0,
			'Message' => '',
			'CategoryID' => '',
		);

		if($this->form_validation->run() == TRUE){

			$input = array(
				'rdo_category_id' => $this->input->post('CategoryID')
			);
			$set = array(
				'rdo_category' => $this->input->post('CategoryName'),
			);

			$updateStatus = $this->Process_Model->UpdateCategory($input,$set);

			if($updateStatus == TRUE){

				$returndata['CategoryID'] = $input['rdo_category_id'];
				$returndata['Message'] = 'Category Updated';

			}else{
				$returndata['Error'] = 1;
				$returndata['Message'] = 'Error in Updating File';
			}

			echo json_encode($returndata);
		
			
		}else{

			$returndata['Error'] = 1;
			$returndata['Message'] = validation_errors();
			echo json_encode($returndata);
		}


		
	}
	public function AjaxDeleteCategory(){

		$this->form_validation->set_rules('CategoryID', 'Category ID', 'required');
		
		$returndata = array(
			'Error' => 0,
			'Message' => '',
			'CategoryID' => '',
		);

		if($this->form_validation->run() == TRUE){

			$input = array(
				'rdo_category_id' => $this->input->post('CategoryID')
			);
			$set1 = array(
				'rdo_category_publish' => 0,
				'rdo_category_active' => 0,
			);
			$set2 = array(
				'rdo_category_id' => 0,
			);
			$updateStatus = $this->Process_Model->UpdateCategory($input,$set1);
			if($updateStatus == true){

				$fileUpdateStatus = $this->Process_Model->UncategorizeCategoryFiles($input,$set2);
				if($fileUpdateStatus == true){

					$returndata['Message'] = 'Category Deleted';

				}else{

					$returndata['Error'] = 1;
					$returndata['Message'] = 'Failed to update assigned files';

				}
				
			}else{

				$returndata['Error'] = 1;
				$returndata['Message'] = 'Error in deleting Category';

			}
			
			
		}else{

			$returndata['Error'] = 1;
			$returndata['Message'] = validation_errors();
			
		}
		echo json_encode($returndata);

		
	}
	public function AjaxAddAdmin(){

		$this->form_validation->set_rules('add_rdo_admin_username', 'Username', 'required|min_length[5]|max_length[150]');
		$this->form_validation->set_rules('add_rdo_admin_name', 'Full Name', 'required|min_length[5]|max_length[250]');
		$this->form_validation->set_rules('add_rdo_admin_pass1', 'Password', 'required|min_length[5]|max_length[150]');
		$this->form_validation->set_rules('add_rdo_admin_pass2', 'Password', 'matches[add_rdo_admin_pass1]');
		$returndata = array(
			'Error' => 0,
			'Message' => '',
			'FileID' => '',
		);
		if($this->form_validation->run() == TRUE){

			$inputs = array(
				'rdo_username' => $this->input->post('add_rdo_admin_username'),
				'rdo_password' => $this->input->post('add_rdo_admin_pass1'),
				'rdo_fullname' => $this->input->post('add_rdo_admin_name')
			);
			$accountCheck = $this->Account_model->CheckExistingAdminAccount($inputs);
			if($accountCheck){

				$returndata['Error'] = 1;
				$returndata['Message'] = 'Username Already Used';

			}else{

				$insertStatus = $this->Account_model->AddAdminAccount($inputs);
				if(!$insertStatus){

					$returndata['Error'] = 1;
					$returndata['Message'] = 'Error in Creating Account';

				}else{

					$returndata['Message'] = 'Account Added!';

				}

			}
			
		}else{

			$returndata['Error'] = 1;
			$returndata['Message'] = validation_errors();

		}
		echo json_encode($returndata);

	}
	public function AjaxUpdateAdmin(){

		$this->form_validation->set_rules('edit_admin_ID', 'Admin ID', 'required');
		$this->form_validation->set_rules('edit_current_admin_username', 'Former Username', 'required', 
			array('required' => 'Cannot Update Account without an Username')
		);
		$this->form_validation->set_rules('edit_rdo_admin_username', 'Username', 'required|min_length[5]|max_length[150]');
		$this->form_validation->set_rules('edit_rdo_admin_name', 'Full Name', 'required|min_length[5]|max_length[250]');
		
		$currentUsername = $this->input->post('edit_current_admin_username');
		$password = $this->input->post('edit_rdo_admin_pass1');
		$password2 = $this->input->post('edit_rdo_admin_pass2');

		if($password != null || $password2 != null){

			$this->form_validation->set_rules('edit_rdo_admin_pass1', 'Password', 'required|min_length[5]|max_length[150]');
			$this->form_validation->set_rules('edit_rdo_admin_pass2', 'Password', 'required|matches[edit_rdo_admin_pass1]',
				array(
					'matches' => 'Password does not match',
					'required' => 'Please Retype Password'
				)
			);

		}
		$returndata = array(
			'Error' => 0,
			'Message' => '',
			'FileID' => '', 
		);
		if($this->form_validation->run() == TRUE){
 
			$id = $this->input->post('edit_admin_ID');
			$inputs = array(
				'rdo_username' => $this->input->post('edit_rdo_admin_username'),
				'rdo_fullname' => $this->input->post('edit_rdo_admin_name')
			);
			if($password != null){

				$inputs['rdo_password'] = $this->input->post('edit_rdo_admin_pass1');

			}

			if($currentUsername != $inputs['rdo_username']){
				$accountCheck = $this->Account_model->CheckExistingAdminAccount($inputs);
				if($accountCheck){
	
					$returndata['Error'] = 1;
					$returndata['Message'] = 'Username Already Used';
					echo json_encode($returndata);
					return;
				}
			}
			
			$updateStatus = $this->Account_model->UpdateAdminAccount($inputs,$id);
			if(!$updateStatus){

				$returndata['Error'] = 1;
				$returndata['Message'] = 'Error in Updating Account';

			}else{

				$returndata['Message'] = 'Account Updated!';

			}
				

			
			
		}else{

			$returndata['Error'] = 1;
			$returndata['Message'] = validation_errors();

		}
		echo json_encode($returndata);

	}
	public function AjaxUpdateExternal(){

		$this->form_validation->set_rules('edit_external_ID', 'External Account ID', 'required');
		$this->form_validation->set_rules('edit_current_external_username', 'Former Username', 'required', 
			array('required' => 'Cannot Update Account without an Username')
		);
		$this->form_validation->set_rules('edit_rdo_external_username', 'Username', 'required|min_length[5]|max_length[150]');
		$this->form_validation->set_rules('edit_rdo_external_name', 'Full Name', 'required|min_length[5]|max_length[250]');
		
		$currentUsername = $this->input->post('edit_current_external_username');
		$password = $this->input->post('edit_rdo_external_pass1');
		$password2 = $this->input->post('edit_rdo_external_pass2');

		if($password != null || $password2 != null){

			$this->form_validation->set_rules('edit_rdo_external_pass1', 'Password', 'required|min_length[5]|max_length[150]');
			$this->form_validation->set_rules('edit_rdo_external_pass2', 'Password', 'required|matches[edit_rdo_external_pass1]',
				array(
						'matches' => 'Password does not match',
						'required' => 'Please Retype Password'
					)
			);

		}
		$returndata = array(
			'Error' => 0,
			'Message' => '',
			'FileID' => '', 
		);
		if($this->form_validation->run() == TRUE){
 
			$id = $this->input->post('edit_external_ID');
			$inputs = array(
				'username' => $this->input->post('edit_rdo_external_username'),
				'fullname' => $this->input->post('edit_rdo_external_name')
			);
			if($password != null){

				$inputs['password'] = $this->input->post('edit_rdo_external_pass1');

			}

			if($currentUsername != $inputs['username']){
				$accountCheck = $this->Account_model->CheckExistingExternalAccount($inputs);
				if($accountCheck){
	
					$returndata['Error'] = 1;
					$returndata['Message'] = 'Username Already Used';
					echo json_encode($returndata);
					return;
				}
			}
			
			$updateStatus = $this->Account_model->UpdateExternalAccount($inputs,$id);
			if(!$updateStatus){

				$returndata['Error'] = 1;
				$returndata['Message'] = 'Error in Updating Account';

			}else{

				$returndata['Message'] = 'Account Updated!';

			}
			
		}else{

			$returndata['Error'] = 1;
			$returndata['Message'] = validation_errors();

		}
		echo json_encode($returndata);

	}
	public function AjaxDeactivateAdmin(){

		$input = array(
			'rdo_admin_id' => $this->input->post('rdo_admin_id')
		);
		$set = array(
			'rdo_active' => 0
		);
		$returndata = array(
			'Error' => 0,
			'Message' => '',
			'FileID' => '',
		);
		$updateStatus = $this->Account_model->UpdateAdminAccount($set,$input['rdo_admin_id']);
		if($updateStatus == TRUE){
			$returndata = array(
				'Error' => 0,
				'Message' => 'Account Deactivated'
			);
		}else{
			$returndata = array(
				'Error' => 1,
				'Message' => 'Error in Deactivating Account'
			);
		}
		echo json_encode($returndata);

	}
	public function AjaxDeactivateExternal(){

		$input = array(
			'ID' => $this->input->post('ID')
		);
		$set = array(
			'active' => 0
		);
		$returndata = array(
			'Error' => 0,
			'Message' => '',
			'FileID' => '',
		);
		$updateStatus = $this->Account_model->UpdateExternalAccount($set,$input['ID']);
		if($updateStatus == TRUE){
			$returndata = array(
				'Error' => 0,
				'Message' => 'Account Deactivated'
			);
		}else{
			$returndata = array(
				'Error' => 1,
				'Message' => 'Error in Deactivating Account'
			);
		}
		echo json_encode($returndata);

	}
	public function AjaxGetAccountSettingDetails(){

		$usertype = $this->session->userdata('LoginData')['Usertype'];
		/*
		$usertype
		$input = array(
			''
		);
		*/

	}
	public function UploadPDF($file = ''){

		$result = array(

			'Error' => 0,
			'FileName' => '',
			'Message' => '',

		);
		$config['upload_path'] = './researches/';
		$config['allowed_types'] ='pdf';
		$config['max_size'] = 100000;
		$config['file_name'] = $this->Get_Unique_PDF(10);

		//Upload File of Cert
		$this->load->library('upload',$config);
		if($this->upload->do_upload($file)){

			$result['Error'] = 0;
			$result['FileName'] = $config['file_name'];

		}else{

			$result['Error'] = 1;
			$result['Message'] = $this->upload->display_errors();

		}

		return $result;
	
	}
	public function Get_Unique_PDF($limit){

		//md5($name.'_'.$UniqueCode))

		$Draft = md5(strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit)));
		$stop = 0;
		//Check availability of code
		if(empty($this->Process_Model->CheckPDFAvailability($Draft))){

			$Final = $Draft;

		}else{

			while($stop < 1){

				$Draft = md5(strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit)));
				if(empty($this->Process_Model->CheckPDFAvailability($data))){
					$Final = $Draft;
					$stop++;
				}

			}

		}
		return $Final;

	}
	public function Layout($View = '',$data = array()){

		$this->load->view('Header',$data);
		$this->load->view($View, $data);
		$this->load->view('Footer',$data);

	}
	
}
