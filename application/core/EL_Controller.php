<?php defined('BASEPATH') OR exit('No direct script access allowed');



class EL_Controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();


		// Security

		$this->load->model( 'Security_model' );

		if( ! $this->Security_model->control() )
		{
			die( 'Security problem, please come back later.' );
		}


		// Language
		
		$lang = $this->session->userdata( 'language' );
		
		if( $lang )
		{
			$this->config->set_item( 'language', $lang );
		}

		$this->lang->load( 'el_general' );
	}
	

}




