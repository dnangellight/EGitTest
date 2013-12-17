<?php
class Dashboard extends Admin_Controller {
	public function __construct() {
		parent::__construct ();
	}
	public function index() {
		//Fetch recently modfied articles
		$this->load->model('Article_model');
		$this->db->order_by('modified desc');
		$this->db->limit(5);
		$this->data['recent_articles'] = $this->Article_model->get();
		
		//Loadviews
		$this->data['subview'] ='admin/dashboard/index.php';
		$this->load->view ( 'admin/_layout_main',$this->data );
	}
	
	public function model() {
		$this->load->view ( 'admin/_layout_model',$this->data );
	}
}