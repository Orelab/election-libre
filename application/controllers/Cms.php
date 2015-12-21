<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends EL_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		
		$this->lang->load( 'el_cms' );
	}
	
	
	
	
	/*
	 *	This part works because a catch-all redirection as benn
	 *	set in the config/routers.php file.
	 */
	function index()
	{
		$page = $this->security->xss_clean( $this->uri->segment(2) );
		$id = $this->security->xss_clean( $this->uri->segment(3) );

		if( $page )
			$this->load->view( "cms/$page", array('id'=>$id) );
			else
			$this->load->view( "cms/index" );
	}


}

