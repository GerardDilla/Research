<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminpage extends CI_Controller {

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
		redirect('index.php/Adminpage/Home','refresh');
	}
	public function Home()
	{
		$admin_login_checker = $this->session->userdata('admin_login_checker');
		if($admin_login_checker == 1){
			
		redirect('index.php/Adminpage/Management','refresh');	
			
		}else{
			
		$this->load->view('Header');
		$this->load->view('Admin_Home');
		$this->load->view('Footer');
		
		}
	}
	public function login_input_check(){

		$this->load->model('Account_model');

		$username = $this->input->post('admin_id');
		$password = $this->input->post('admin_pass');

		//echo 'username: '.$this->input->get_post('admin_id').'<br>';
		//echo 'password: '.$this->input->get_post('admin_pass').'<br>';
		
		$this->form_validation->set_rules('admin_id', 'Username', 'required|regex_match[/^[a-z0-9A-Z]+$/]');

		$this->form_validation->set_rules('admin_pass', 'Password', 'required|regex_match[/^[a-z0-9A-Z]+$/]');


		
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
		
		//echo 'success';
		$this->load->model('Account_model');
		$this->Account_model->admin_login();
		$admin_login_checker = $this->session->userdata('admin_login_checker');

		if($admin_login_checker == 1){
			
			redirect('index.php/Adminpage/Management','refresh');		
			
		}
		else
		{
				
			$this->load->view('Header');
			$this->load->view('Admin_Home');
			$this->load->view('Footer');
				
		}
			
		

	}
	public function Management()
	{

		$this->load->model('List_model');
		$this->load->model('Account_model');
		$admin_login_checker = $this->session->userdata('admin_login_checker');


		if($admin_login_checker == 1){
		
			$this->load->view('Header');
			$this->load->view('Admin_page');
			$this->load->view('Footer');
		
		}
		else{
			
			$this->Home();
			
		}
	}
	public function Logout()
	{
		$this->session->unset_userdata('admin_login_checker');
		
		redirect('index.php/Adminpage/Home','refresh');
	}
	
}
