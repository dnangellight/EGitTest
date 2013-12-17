<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Page extends Admin_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'Page_model' );
	}
	public function index() {
		// fetch all Pages
		$this->data ['pages'] = $this->Page_model->get_pages_with_parents ();
		
		// Load view
		$this->data ['subview'] = 'admin/page/index';
		
		$this->load->view ( 'admin/_layout_main', $this->data );
	}
	
	
	
	
	
	public function order() {
		$this->data['sortable'] = TRUE;
		$this->data ['subview'] = 'admin/page/order';
		
		$this->load->view ( 'admin/_layout_main', $this->data );
	}
	
	//post the result we have created
	public function order_ajax() {
		
		//retrive key sortable frm ajax request
		if (isset($_POST['sortable'])) {
			
			$this->Page_model->save_reordered_pages($_POST['sortable']);
		}
		//Fetch all pages
		$this->data['pages'] = $this->Page_model->get_nested_pages();
		
		
		$this->load->view ( 'admin/page/order_ajax', $this->data );
		
	}
	

	
	public function edit($id = NULL) {
		
		// Fetch a Page with id or set a new one
		if ($id) {
			
			$this->data ['page'] = $this->Page_model->get ( $id );
			
			count ( $this->data ['page'] ) || $this->data ['error'] [] = 'Page not in database!';
		} else {
			
			$this->data ['page'] = $this->Page_model->get_new_page ();
		}
		
		$this->data ['pages_without_parents'] = $this->Page_model->get_pages_without_parents ();
		// dump($this->data['pages_without_parents']);
		
		// Set the form
		$rules = $this->Page_model->rules;
		
		$this->form_validation->set_rules ( $rules );
		
		if ($this->form_validation->run () === TRUE) {
			
			$data = $this->Page_model->array_from_post ( array (
					'title',
					'slug',
					'pid',
					'template',
					'body' 
			)
			 );
			
			$this->Page_model->save ( $data, $id );
			redirect ( 'admin/page' );
		}
		
		// Load the view
		$this->data ['subview'] = 'admin/Page/edit';
		$this->load->view ( 'admin/_layout_main', $this->data );
	}
	public function delete($id) {
		$this->Page_model->delete ( $id );
		redirect ( 'admin/Page' );
	}
	
	// call back
	public function _unique_slug($str) {
		
		// Do not validate if slug already exists,Unless it's the slug for current Page
		$id = $this->uri->segment ( 4 );
		
		$this->db->where ( 'slug', $this->input->post ( 'slug' ) );
		
		! $id || $this->db->where ( 'id !=', $id );
		$page = $this->Page_model->get ();
		if (count ( $page )) {
			$this->form_validation->set_message ( '_unique_slug', '%s should be unique!!' );
			return FALSE;
		}
		return TRUE;
	}
}