<?php
class  Article extends Frontend_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->data['recent_articles'] = $this->Article_model->get_recent();
	}
	
	public function index($id,$slug) {
		//fetch the article
		$this->Article_model->set_published_date();
		$this->data['article'] = $this->Article_model->get($id);
		
		//Return 404 if not found
		count($this->data['article']) || show_404(uri_string());
		$article = $this->data['article'];
		
		//redirect if slug was incorrect
		$request_slug = $this->uri->segment(3);
		$set_slug = $article->slug;
		if ($request_slug != $set_slug) {
			redirect('article/'.$article->id.'/'.$article->slug,'location','301');
		}
		
		
		add_meta_title($this->data['article']->title);
		//set view
		$this->data['subview'] = 'article';
		$this->load->view('front_end/_layout_main',$this->data);
	}
	
}