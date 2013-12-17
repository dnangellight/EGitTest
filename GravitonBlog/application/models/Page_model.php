<?php
class Page_model extends MY_Model {
	protected $_table_name = 'pages';
	protected $_order_by = 'order';
	public $rules = array (
			'template' => array (
					'field' => 'template',
					'label' => 'Template',
					'rules' => 'trim|required|xss_clean' 
			),
			'title' => array (
					'field' => 'title',
					'label' => 'Title',
					'rules' => 'trim|required|max_length[100]|xss_clean' 
			),
			'slug' => array (
					'field' => 'slug',
					'label' => 'Slug',
					'rules' => 'trim|required|max_length[100]|url_title|callback__unique_slug|xss_clean' 
			),
			'order' => array (
					'field' => 'order',
					'label' => 'Order',
					'rules' => 'trim|is_natural|xss_clean' 
			),
			'body' => array (
					'field' => 'body',
					'label' => 'Body',
					'rules' => 'trim|required|' 
			),
			'pid' => array (
					'field' => 'pid',
					'label' => 'Parent',
					'rules' => 'trim|intval' 
			) 
	);
	
	
	public function get_archieve_link(){
		
	  $page = parent::get_by(array('template'=>'article_archive'),TRUE);
	  return isset($page->slug)? $page->slug : '';	
	}
	
	
	public function delete($id) {
		parent::delete ( $id );
		$this->db->set ( array (
				'pid' => 0 
		) )->where ( 'pid', $id )->update ( $this->_table_name );
	}
	public function get_new_page() {
		$page = new stdClass ();
		$page->title = '';
		$page->email = '';
		$page->slug = '';
		$page->body = '';
		$page->template = 'page';
		$page->pid = 0;
		return $page;
	}
	public function get_pages_with_parents($id = NULL, $single = FALSE) {
		$this->db->select ( 'pages.*,p.slug as parent_slug,p.title as parent_title' );
		$this->db->join ( 'pages as p', 'pages.pid=p.id', 'left' );
		
		return parent::get ( $id, $single );
	}
	public function get_pages_without_parents() {
		// Fetch pages without parents
		$this->db->select ( 'id,title' );
		$this->db->where ( 'pid', 0 );
		$pages = parent::get ();
		
		$array = array (
				0 => 'No parent' 
		);
		if (count ( $pages )) {
			foreach ( $pages as $page ) {
				$array [$page->id] = $page->title;
			}
		}
		
		return $array;
	}
	public function get_nested_pages() {
		$this->db->order_by($this->_order_by);
		$pages = $this->db->get ( 'pages' )->result_array ();
		
		$array = array ();
		foreach ( $pages as $page ) {
			if (! $page ['pid']) {
				$array [$page ['id']] = $page;
			} else {
				$array [$page ['pid']] ['children'] [] = $page;
			}
			;
		}
		return $array;
	}
	public function save_reordered_pages($pages) {
		if (count ( $pages )) {
			
			foreach ( $pages as $order => $page ) {
				if ($page ['item_id'] != '') {
					$data = array (
							'pid' => $page ['parent_id'],
							'order' => $order 
					);
					$this->db->set ( $data )->where ( $this->_primary_key, $page ['item_id'] )->update ( $this->_table_name );
					// echo '<pre>'.$this->db->last_query().'</pre>';
				}
				;
			}
			;
		}
	}
	public function __construct() {
		parent::__construct ();
	}
}