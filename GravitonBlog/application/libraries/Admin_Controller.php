<?php
class Admin_Controller extends MY_Controller {
	
	
	
	public function __construct(){
		
		parent:: __construct();
				$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('User_model');
		$this->load->library('session');
		$this->data['meta_title'] = 'My awsome blog';
		
		
		
	
		//login check
		$exception_uris = array(
			'admin/user/login',
				'admin/user/logout'
		);
		
		 if(in_array(uri_string(), $exception_uris)==FALSE){
			if ($this->User_model->isLoggedin() == FALSE) {
				redirect('admin/user/login');
			}
				
		} 
	}
}