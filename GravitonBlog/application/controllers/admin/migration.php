<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Migration extends Admin_Controller {
	public function __construct() {
	
		parent::__construct ();
	}
	public function index() {
	
		//copied from http://ellislab.com/codeigniter%20/user-guide/libraries/migration.html
		$this->load->library ( 'migration' );
	
		
		if (! $this->migration->current ()) {
			show_error ('Error===!!!!!   ' .$this->migration->error_string () );
		}else{
			echo 'Migration Worked!!';
		}
	}
} 