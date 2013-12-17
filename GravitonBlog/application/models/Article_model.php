<?php
class Article_model extends MY_Model {
	protected $_table_name = 'articles';
	protected $_timestamps = TRUE;
	protected $_order_by = 'pubdate desc,id desc';
	public $rules = array (
		
		'title' => array('field'=>'title','label'=>'Title','rules'=>'trim|required|max_length[100]|xss_clean')	,
			'slug' => array('field'=>'slug','label'=>'Slug','rules'=>'trim|required|max_length[100]|url_title|xss_clean')	,
			
			'body' => array('field'=>'body','label'=>'Body','rules'=>'trim|required|')	,
			'pubdate' => array('field'=>'pubdate','label'=>'Publication date','rules'=>'required|exactlength[10]|xss_clean')	,
			
			
	);

	
	
	

	public  function get_new_article(){
	// @todo dsfdfdf
		$article = new stdClass();
		$article->title = '';
		$article->email = '';
		$article->slug = '';
		$article->body = '';
		$article->pubdate = date('Y-m-d');
		return $article;
	
	}

	
	public function set_published_date(){
		//TODO Replace all instances of pubdate
		$this->db->where('pubdate <=' ,date('Y-m-d'));
		
	
	}
	
	public function get_recent($limit=3){
		$limit = (int)$limit;
		$this->set_published_date();
		$this->db->limit($limit);
		
	
		return parent::get();
	}
	public function __construct() {
		parent::__construct ();
	}
}