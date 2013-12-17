<?php
class Frontend_Controller extends My_Controller {
	
	
	public $data = array();
	public function __construct(){
		
		parent:: __construct();
	
		//Run at startup
		$this->load->model('Page_model');
		$this->load->model('Article_model');
		//TODO Removes all article model elsewhere
		//Fetch navi
		;
		$this->data['menu'] = $this->Page_model->get_nested_pages();
		$this->data['article_archieve_link'] = $this->Page_model->get_archieve_link();
		$this->data['meta_title'] = config_item('site_name');
		//dump($this->Article_model->get_recent());
	}
}