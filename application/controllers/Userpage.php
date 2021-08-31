<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userpage extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		redirect('index.php/Userpage/Home','refresh');
	}
	public function Home()
	{
		$login_checker = $this->session->userdata('login_checker');
		$faculty_login_checker = $this->session->userdata('faculty_login_checker');
		//echo $faculty_login_checker;
		//echo $login_checker;
		if($login_checker == 1){
		
			redirect('index.php/Userpage/Main','refresh');
		
		}
		else if($faculty_login_checker == 1){
			
			redirect('index.php/Userpage/Faculty_Main','refresh');
			
		}
		else{
			
			$this->load->view('Header');
			$this->load->view('Home');
			$this->load->view('Footer');
			
		}
	}
	public function login_input_check(){

		$this->load->model('Account_model');

		$student_number = $this->input->post('student_number');
		$student_password = $this->input->post('student_password');

		//echo 'student_number:   '.$this->input->get_post('admin_id').'<br>';
		//echo 'student_password: '.$this->input->get_post('admin_pass').'<br>';
		
		$this->form_validation->set_rules('student_number', 'Student Number', 'required|regex_match[/^[a-z0-9A-Z]+$/]');

		$this->form_validation->set_rules('student_password', 'Password', 'required|regex_match[/^[a-z0-9A-Z]+$/]');


		
		//echo form_open('form');
		//echo $this->input->post('admin_id');
		//echo $this->input->post('admin_id');

		if($this->form_validation->run() == FALSE){

			//echo validation_errors();
			//echo 'fail';
			$this->Home();
		
		}
		else
		{
			$this->Login();
			//echo 'pass';
			//echo validation_errors();
			//$this->login();

		}

	}
	public function Login()
	{
		$this->load->model('Account_model');
		$this->Account_model->student_login();
		$login_checker = $this->session->userdata('login_checker');
		$data['active'] = 'active';

		if($login_checker == 1){
		
		redirect('index.php/Userpage/Main','refresh');
		
		
		}else{
			
		$this->load->view('Header');
		$this->load->view('Home', $data);
		$this->load->view('Footer');
			
			}
	}
	public function faculty_login_input_check(){

		$this->load->model('Account_model');

		$faculty_id = $this->input->post('faculty_id');
		$faculty_pass = $this->input->post('faculty_pass');

		//echo 'faculty_id:   '.$this->input->get_post('faculty_id').'<br>';
		//echo 'faculty_pass: '.$this->input->get_post('faculty_pass').'<br>';
		
		$this->form_validation->set_rules('faculty_id', 'Username', 'required|regex_match[/^[a-z0-9A-Z]+$/]');

		$this->form_validation->set_rules('faculty_pass', 'Password', 'required|regex_match[/^[a-z0-9A-Z]+$/]');

		//echo form_open('form');
		//echo $this->input->post('admin_id');
		//echo $this->input->post('admin_id');

		if($this->form_validation->run() == FALSE){

			//echo validation_errors();
			//echo 'fail';
			$this->Home();
		
		}
		else
		{
			$this->Faculty_Login();
			//echo 'pass';
			//echo validation_errors();
			//$this->login();

		}

	}
	public function Faculty_Login()
	{
		$this->load->model('Account_model');
		$this->Account_model->faculty_login();
		$faculty_login_checker = $this->session->userdata('faculty_login_checker');
		$data['active'] = 'active';

		if($faculty_login_checker == 1){
		
		redirect('index.php/Userpage/Faculty_Main','refresh');
		
		
		}else{
			
		$this->load->view('Header');
		$this->load->view('Home', $data);
		$this->load->view('Footer');
			
			}
	}
	public function Main()
	{
		$test = $this->input->post('test');
		echo $test;
		$this->load->model('List_model');
		$data['pdf_list'] = $this->List_model->pdf_list();
		$data['category_dropdown'] = $this->List_model->category_list();
		$data['department_dropdown'] = $this->List_model->department_list();
		$data['user_name'] = $this->session->userdata('First_Name');

		
		$login_checker = $this->session->userdata('login_checker');
		//echo $login_checker;
		
		if($login_checker == 1){
		
		$this->load->view('Header');
		$this->load->view('Main_page',$data);
		$this->load->view('Footer');
		
		}else
		{
			
		redirect('index.php/Userpage/Home','refresh');	
		
		}
	}
	public function Faculty_Main()
	{
		$this->load->model('List_model');
		$data['pdf_list'] = $this->List_model->pdf_list();
		$data['user_name'] = $this->session->userdata('Instructor_Name');
		$data['category_dropdown'] = $this->List_model->category_list();
		$data['department_dropdown'] = $this->List_model->department_list();
		
		
		$faculty_login_checker = $this->session->userdata('faculty_login_checker');
		
		if($faculty_login_checker == 1){
		
		$this->load->view('Header');
		$this->load->view('Main_page',$data);
		$this->load->view('Footer');
		
		}else
		{
			
		redirect('index.php/Userpage/Home','refresh');	
		
		}
	}
	public function Logout()
	{
		$this->session->unset_userdata('login_checker');
		$this->session->unset_userdata('faculty_login_checker');
		redirect('index.php/Userpage/Home','refresh');
	}
	
}
