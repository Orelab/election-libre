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
			die( 'Security problem, please come back tomorrow.' );
		}

		
		
		// Session validation

		if( $this->session->has_userdata('ip') )
		{
			if( $this->session->userdata('ip') != $this->input->ip_address() )
			{
				print_r( $this->session->userdata('ip') );
				echo $this->input->ip_address();
				$this->panic( 'IP mismatch' );
			}
		}
		else
		{
			$this->session->set_userdata( 'ip', $this->input->ip_address() );
		}

		
		if( $this->session->has_userdata('ua') )
		{
			if( $this->session->userdata('ua') != $this->input->user_agent() )
			{
				$this->panic( 'User agent mismatch' );
			}
		}
		else
		{
			$this->session->set_userdata( 'ua', $this->input->user_agent() );
		}


		// Language
		
		$lang = $this->session->userdata( 'language' );
		
		if( $lang )
		{
			$this->config->set_item( 'language', $lang );
		}

		$this->lang->load( 'el_general' );
	}



	
	private function panic( $msg=null )
	{
		if( $msg )
		{
	//		die( $msg );
		}
		
		$this->session->sess_destroy();
		redirect( base_url() );
		die();
	}
	

}




