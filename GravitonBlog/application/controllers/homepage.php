<?php
class Homepage extends Frontend_Controller{
	
	public function __construct(){
	
		parent:: __construct();
	  $this->load->model('Page_model');
	 
	}
	
	public function index(){
	
	//dump($this->uri->segment(1));
		$this->data['page'] = $this->Page_model->get_by(array('slug' => $this->uri->segment(1)),TRUE);
		count($this->data['page'])||show_404(current_url());
		//echo '<pre>'.$this->db->last_query().'<pre>';
		
		add_meta_title($this->data['page']->title);
		//Fetch the page data
		$method = '_'.$this->data['page']->template;
		if (method_exists($this,$method)) {
			$this->$method();
		}else{
			
			log_message('error','No such Template'.$method.' in file '.__FILE__.' at line '.__LINE__);
			show_error('Could not load template, please add '.$method);
		}
		
		
		
		$this->data['subview'] = $this->data['page']->template;
		$this->load->view('front_end/_layout_main',$this->data);
		
	}
	
	
	
	//Callback for slug on homepage
	private function _page(){
		
		$this->data['recent_articles'] = $this->Article_model->get_recent();
	}

	private function _homepage(){
	   
	 $this->Article_model->set_published_date();
	   $this->db->limit(6);
	   $this->data['articles'] = $this->Article_model->get();
	
	}
	private function _article_archive(){
		
		
		
		$this->data['recent_articles'] = $this->Article_model->get_recent();
	     //Count all articles
	$this->Article_model->set_published_date();
		$count = $this->db->count_all_results('articles');
	//	dump($count);
	     //Set pagination
	     $perpage = 4;
	     if ($count > $perpage) {
	     	$this->load->library('pagination');
$config['base_url'] = site_url($this->uri->segment(1) .'/');
$config['total_rows'] = $count;
$config['per_page'] = $perpage; 
$config['uri_segment'] = 2;




$this->pagination->initialize($config); 

$this->data['pagination'] =  $this->pagination->create_links();
$offset = $this->uri->segment(2);
	     }else {
	     	$this->data['pagination'] = '';
	     	$offset = 0;
	     	
	     }
	     
	  //   dump($this->data['pagination']);
	     //Fatch articles
	   $this->Article_model->set_published_date();
	     $this->db->limit($perpage,$offset);
	     $this->data['articles'] =$this->Article_model->get();
	 //    dump(count($this->data['articles']));
	  //   echo  '<pre>'.$this->db->last_query().'</pre>';
	}
}