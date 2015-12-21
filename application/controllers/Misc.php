<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Misc extends EL_Controller
{

	public function lang()
	{
		$lang = strtolower( $this->input->post( 'lang', true ) );
		$this->session->set_userdata( 'language', $lang );

		die( 'ok' );
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect( base_url() );
		die();
	}


	/*
	 *	This controller is used to convert a spreadsheet file to json array,
	 *	usefull during electors seizure...
	 *
	 *	A fourth column is added, and contains a boolean value which is true
	 *	when the email is correctly formed.
	 *
	 */
	public function csv2json()
	{
		//-- Security
		
		$this->Security_model->log( 'csv to json', 1 );


		//-- Conversion

		$this->load->helper(array('form', 'url'));
		$this->load->library('upload');
		
		if( $this->upload->do_upload('elector_list') )
		{
			$fileinfo = $this->upload->data();
		}
		else
		{
			die_error( $this->upload->display_errors() );
		}
		
		if( $fileinfo['file_type']!='text/plain' )
		{
			die_error( 'bad file type.' );		
		}
		
		if( $fileinfo['file_ext']!='.csv' )
		{
			die_error( 'bad file extension.' );		
		}
		
		$data = array_map( "str_getcsv", file( $fileinfo['full_path'] ) );

		unlink( $fileinfo['full_path'] );

		if( ! is_array($data) )
		{
			die_error( 'corrupted data.' );
		}

		if( count($data)<1 )
		{
			die_error( 'empty file.' );		
		}
		
		if( count($data[0])<3 )
		{
			die_error( 'titles are missing.' );
		}
		
		if( implode( $data[0] ) == "prenomnomadresse email" )
		{
			array_shift( $data );
		}
		
		foreach( $data as &$d )
		{
			$d[] = filter_var( $d[2], FILTER_VALIDATE_EMAIL ) ? true : false;
		}
		
		echo json_encode( $data );	
	}
	
	
	
	public function email_validation()
	{
		$email = $this->input->post( 'email', true );


		//-- Security
		//
		//	This task is restricted to disallow users to fetch the database
		//	for existing accounts.
		
		$this->Security_model->log( 'email validation', 1 );


		//-- check the email format
		
		if( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) )
		{
			die( 'Invalid email' );
		}


		//-- check if email is ever registered
		
		$this->load->model( 'Election_model' );
		$elections = $this->Election_model->get( null, $email, true );
		
		if( count($elections)>=1 )
		{
			die( 'Unavailable email' );
		}
		
		die( 'ok' );

	}


}










