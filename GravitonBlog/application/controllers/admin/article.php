<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Article extends Admin_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'Article_model' );
	}
	public function index() {
		// fetch all articles
		$this->data['articles'] = $this->Article_model->get();
		
		// Load view
		$this->data ['subview'] = 'admin/article/index';
		
		$this->load->view ( 'admin/_layout_main', $this->data );
	}
	public function edit($id = NULL) {
		
		// Fetch a article with id or set a new one
		if ($id) {
			
			$this->data ['article'] = $this->Article_model->get ( $id );
			
			count ( $this->data ['article'] ) || $this->data ['error'] [] = 'Article not in database!';
		} else {
			
			$this->data ['article'] = $this->Article_model->get_new_article ();
			
		}
		
	
		// dump($this->data['articles_without_parents']);
		
		// Set the form
		$rules = $this->Article_model->rules;
		
		$this->form_validation->set_rules ( $rules );
		
		if ($this->form_validation->run () === TRUE) {
			
			$data = $this->Article_model->array_from_post ( array (
					'title',
					'slug',
					'pubdate',
					'body' 
			) );
			
			$this->Article_model->save ( $data, $id );
			
			
			
			redirect ( 'admin/article' );
		}
		
		// Load the view
		$this->data ['subview'] = 'admin/article/edit';
		$this->load->view ( 'admin/_layout_main', $this->data );
	}
	public function delete($id) {
		$this->Article_model->delete ( $id );
		redirect ( 'admin/article' );
	}
}