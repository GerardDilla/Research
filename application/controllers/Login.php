<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	function __construct() 
	{
		  parent::__construct();
		  $this->load->library('form_validation');
		  //load file helper
		  $this->load->helper('file');
		  $this->load->model('Account_model');
		
		  //Sets Timezone for
		  date_default_timezone_set('Asia/Manila');

		  //Defines log date
		  $this->now = new DateTime();
		  $this->logdatetime =  $this->now->format('Y-m-d H:i:s');
		  $this->logdate = date("Y/m/d");

		  $this->load->library('custom_presets');
		  $this->usertypes = $this->custom_presets->usertypes();

	}
	public function index()
	{

		$this->Layout('Home');

	}
	public function Administrator()
	{

		$this->AdminLayout('Admin_Home');

	}
	public function Init_StudentLogin(){


		//Redirects if attempted to bypass
		$loginstart = $this->input->post('loginstart');
		if(!$loginstart){
			redirect('Login');
		}

		//Form Validation
		$config = array(
			array(
				'field' => 'student_number',
				'label' => 'Student Number',
				'rules' => 'required'
			),
			array(
				'field' => 's_password',
				'label' => 'Password',
				'rules' => 'required'
			)
		);
		$this->form_validation->set_rules($config);
		
		if($this->form_validation->run() == TRUE){

			//Gather Input
			$credentials = array(
				'Student_Number' => $this->input->post('student_number'),
				'Password' => $this->input->post('s_password')
			);

			//Check Login
			$loginstatus = $this->Account_model->StudentLogin($credentials);
			if($loginstatus){

				//Save Login Session
				$this->LoginSession($loginstatus[0],$this->usertypes['student']);

				$this->session->set_flashdata('activetab','student');
				$mconfig['message'] = 'Logged In';
				$mconfig['color'] = 'green';
				$mconfig['icon'] = 'fa-check-square';
				$mconfig['Redirect'] = 1;
				$mconfig['Link'] = 'Main';
				$this->message($mconfig);

			}else{

				$this->session->set_flashdata('activetab','student');
				$mconfig['color'] = 'red';
				$mconfig['icon'] = 'fa-exclamation-triangle';
				$mconfig['message'] = 'Invalid Username or Password';
				$mconfig['Redirect'] = 1;
				$this->message($mconfig);
			}

		}else{

			$this->session->set_flashdata('activetab','student');
			$mconfig['color'] = 'red';
			$mconfig['Redirect'] = 1;
			$mconfig['message'] = validation_errors();
			$this->message($mconfig);	

		}

	}
	public function Init_TeacherLogin(){

		//Redirects if attempted to bypass
		$loginstart = $this->input->post('loginstart');
		if(!$loginstart){
			redirect('Login');
		}

		//Form Validation
		$config = array(
			array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required'
			),
			array(
				'field' => 't_password',
				'label' => 'Password',
				'rules' => 'required'
			)
		);

		$this->form_validation->set_rules($config);
		
		if($this->form_validation->run() == TRUE){
			
			//Gather Input
			$credentials = array(
				'Instructor_ID' => $this->input->post('username'),
				'Passkey' => $this->input->post('t_password')
			);

			//Check Login
			$loginstatus = $this->Account_model->TeacherLogin($credentials);
			if($loginstatus){

				//Save Login Session
				$this->LoginSession($loginstatus[0],$this->usertypes['teacher']);
				$this->session->set_flashdata('activetab','teacher');
				$mconfig['message'] = 'Logged In';
				$mconfig['icon'] = 'fa-check-square';
				$mconfig['color'] = 'green';
				$mconfig['Redirect'] = 1;
				$mconfig['Link'] = 'Main';
				$this->message($mconfig);

			}else{

				$peerstatus = $this->Account_model->PeerLogin($credentials);
				if($peerstatus){

					//Save Login Session
					$this->LoginSession($peerstatus[0],$this->usertypes['external']);
					$this->session->set_flashdata('activetab','teacher');
					$mconfig['message'] = 'Logged In';
					$mconfig['icon'] = 'fa-check-square';
					$mconfig['color'] = 'green';
					$mconfig['Redirect'] = 1;
					$mconfig['Link'] = 'Main';
					$this->message($mconfig);

				}else{

					$this->session->set_flashdata('activetab','teacher');
					$mconfig['message'] = 'Invalid Username or Password';
					$mconfig['icon'] = 'fa-exclamation-triangle';
					$mconfig['color'] = 'red';
					$mconfig['Redirect'] = 1;
					$this->message($mconfig);

				}

			}

		}else{
			
			
			$this->session->set_flashdata('activetab','teacher');
			$mconfig['color'] = 'red';
			$mconfig['Redirect'] = 1;
			$mconfig['message'] = validation_errors();
			$this->message($mconfig);

		}

	}
	public function Init_AdminLogin(){

		//Redirects if attempted to bypass
		$loginstart = $this->input->post('loginstart');
		if(!$loginstart){
			redirect('Login');
		}

		//Form Validation
		$config = array(
			array(
				'field' => 'AdminUsername',
				'label' => 'Username',
				'rules' => 'required'
			),
			array(
				'field' => 'AdminPassword',
				'label' => 'Password',
				'rules' => 'required'
			)
		);

		$this->form_validation->set_rules($config);
		
		if($this->form_validation->run() == TRUE){
			
			//Gather Input
			$credentials = array(
				'rdo_username' => $this->input->post('AdminUsername'),
				'rdo_password' => $this->input->post('AdminPassword')
			);

			//Check Login
			$loginstatus = $this->Account_model->TeacherLogin($credentials);
			if($loginstatus){

				//Save Login Session
				$this->LoginSession($loginstatus[0],$this->usertypes['admin']);
				$mconfig['message'] = 'Logged In';
				$mconfig['icon'] = 'fa-check-square';
				$mconfig['color'] = 'green';
				$mconfig['Redirect'] = 1;
				$mconfig['Link'] = 'Main';
				$this->message($mconfig);

			}else{

			
				$mconfig['message'] = 'Invalid Username or Password';
				$mconfig['icon'] = 'fa-exclamation-triangle';
				$mconfig['color'] = 'red';
				$mconfig['Redirect'] = 1;
				$this->message($mconfig);

			}

		}else{
			
			
			$this->session->set_flashdata('activetab','teacher');
			$mconfig['color'] = 'red';
			$mconfig['Redirect'] = 1;
			$mconfig['message'] = validation_errors();
			$this->message($mconfig);

		}

	}
	public function LoginSession($data,$type){

		$sessionData['Usertype'] = $type;
		if($type == $this->usertypes['student']){
			$sessionData['Fullname'] = $data['First_Name'].' '.$data['Middle_Name'].' '.$data['Last_Name'];
			$sessionData['ID'] = $data['Student_Number'];
		}
		if($type == $this->usertypes['teacher']){
			$sessionData['Fullname'] = $data['Instructor_Name'];
			$sessionData['ID'] = $data['Instructor_ID'];
		}
		if($type == $this->usertypes['admin']){
			$sessionData['Fullname'] = $data['First_Name'].' '.$data['Middle_Name'].' '.$data['Last_Name'];
			$sessionData['ID'] = $data['Student_Number'];
		}
		if($type == $this->usertypes['external']){
			$sessionData['Fullname'] = $data['fullname'];
			$sessionData['ID'] = $data['ID'];
		}
		$this->session->set_userdata('LoginData',$sessionData);

	}
	public function AdminLayout($View = '',$data = array()){

		$this->load->view('Header',$data);
		$this->load->view($View, $data);
		$this->load->view('Footer',$data);

	}
	public function Layout($View = '',$data = array()){

		$this->load->view('Header',$data);
		$this->load->view($View, $data);
		$this->load->view('Footer',$data);

	}
	private function message($config = array()){


		//Prefered error icon: fa-exclamation-triangle
		//Prefered success icon: fa-check-square

		$index = 'index.php/';

		$setup = array(
			'message' => array_key_exists('message',$config) == true ? $config['message'] : '',
			'color' => array_key_exists('color',$config) == true ? $config['color'] : '',
			'icon' => array_key_exists('icon',$config) == true ? $config['icon'] : '',
			'Redirect' => array_key_exists('Redirect',$config) == true ? $config['Redirect'] : 0,
			'Link' => array_key_exists('Link',$config) == true ? $config['Link'] : $this->router->fetch_class(),
			'Name' => array_key_exists('Name',$config) == true ? $config['Name'] : 'message',
		);

		print_r($setup);

		$this->session->set_flashdata('icon', $setup['icon']);
		$this->session->set_flashdata('color', $setup['color']);
		$this->session->set_flashdata($setup['Name'], $setup['message']);

		if($config['Redirect'] == 1){

			redirect($index.''.$config['Link']);

		}

	}
	public function Logout(){

		$this->session->unset_userdata('LoginData');
		redirect('index.php/Login');

	}
	
}
