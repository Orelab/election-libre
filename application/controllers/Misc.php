<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Misc extends EL_Controller
{

	public function lang()
	{
		$lang = strtolower( $this->input->post( 'lang', true ) );
		$this->session->set_userdata( 'language', $lang );

		die( 'ok' );
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


}










