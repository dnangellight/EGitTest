<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class User extends Admin_Controller {
	public function __construct() {
		parent::__construct ();
	}
	public function index() {
		// fetch all users
		$this->data ['users'] = $this->User_model->get ();
		
		// Load view
		$this->data ['subview'] = 'admin/user/index';
		
		$this->load->view ( 'admin/_layout_main', $this->data );
	}
	public function edit($id = NULL) {
		
		// Fetch a user with id or set a new one
		if ($id) {
			
			$this->data ['user'] = $this->User_model->get ( $id );
			
			count ( $this->data ['user'] ) || $this->data ['error'] [] = 'User not in database!';
		} else {
			
			$this->data ['user'] = $this->User_model->get_new_user ();
		}
		
		// Set the form
		$rules = $this->User_model->rules_admin;
		
		$id || $rules ['password'] ['rules'] .= '|required';
		$this->form_validation->set_rules ( $rules );
		
		if ($this->form_validation->run () === TRUE) {
			
			$data = $this->User_model->array_from_post ( array (
					'name',
					'email',
					'password' 
			) );
			
			$data ['password'] = $this->User_model->hash ( $data ['password'] );
			
			$this->User_model->save ( $data, $id );
			redirect ( 'admin/user' );
		}
		
		// Load the view
		$this->data ['subview'] = 'admin/user/edit';
		$this->load->view ( 'admin/_layout_main', $this->data );
	}
	public function delete($id) {
		$this->User_model->delete ( $id );
		redirect ( 'admin/user' );
	}
	public function login() {
		$dashboard = 'admin/dashboard';
		
		$this->User_model->isLoggedin () == FALSE || redirect ( $dashboard );
		$rules = $this->User_model->rules;
		$this->form_validation->set_rules ( $rules );
		
		// process the form
		if ($this->form_validation->run () === TRUE) {
			
			if ($this->User_model->login () == TRUE) {
				
				redirect ( $dashboard );
			} else {
				
				$this->session->set_flashdata ( 'error', 'The PASSWORD/EMAIL does not exist' );
		//	redirect ( 'admin/user/login', 'refresh' );
			}
		}
		$this->data ['subview'] = 'admin/user/login';
		
		$this->load->view ( 'admin/_layout_model', $this->data );
	}
	public function logout() {
		$this->User_model->logout ();
		redirect ( 'admin/user/login' );
	}
	
	// call back
	public function _unique_email($str) {
		
		// Do not validate if email already exists,Unless it's the email for current user
		$id = $this->uri->segment ( 4 );
		
		$this->db->where ( 'email', $this->input->post ( 'email' ) );
		! $id || $this->db->where ( 'id !=', $id );
		$user = $this->User_model->get ();
		if (count ( $user )) {
			$this->form_validation->set_message ( '_unique_email', '%s should be unique!!' );
			return FALSE;
		}
		return TRUE;
	}
}