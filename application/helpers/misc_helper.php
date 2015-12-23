<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if ( ! function_exists('random_key') )
{
	function random_key( $length=20 )
	{
		$allowed_characters='ABCDEFGHJKMNPQRSTUVWXYZ123456789';
		$key = "";
		$len = strlen( $allowed_characters ) - 1;
		
		for( $i=0 ; $i<$length ; $i++ )
		{
			$key .= substr( $allowed_characters, rand(0,$len), 1 );
		}
		
		return $key;
	}
}	



if ( ! function_exists('die_error') )
{
	function die_error( $error )
	{
		$title = "Election Libre error";
		$time = date( "d-m-y h:i:s" );
		
		// ...
		
		die( $error );
	}
}



if ( ! function_exists('sendmail') )
{
	function sendmail( $data )
	{

		// formating email

		$sys_name = 'Election Libre';
		$sys_address = 'no-reply@election-libre.com';
		
		if( ! is_array( $data ) )
		{
			die_error( 'Bad datatype.' );
		}
		
		if( ! isset( $data['subject'] )
		 or ! isset( $data['message'] )
		 or ! isset( $data['toEmail'] ) )
		{
			die_error( 'Incomplete mail information.' );
		}

		$CI =& get_instance();
		$CI->load->library( 'email' );

		$CI->email->subject( $data['subject'] );
		$CI->email->message( $data['message'] );
		
		if( isset($data['fromEmail']) )
			$reply_to = $data['fromEmail'];
			else
			$reply_to = $sys_address;

		if( isset($data['fromName']) )
			$CI->email->from( $sys_address, $data['fromName'] );
			else
			$CI->email->from( $sys_address, $sys_name );
		
		if( isset($data['fromBusiness']) )
			$CI->email->reply_to( $reply_to, $data['fromBusiness'] );
			else
			$CI->email->reply_to( $reply_to );

		if( isset($data['toName']) )
			$CI->email->to( $data['toEmail'], $data['toName'] );
			else
			$CI->email->to( $data['toEmail'] );



		// Sending email
		
		return $CI->email->send() ? true : $CI->email->print_debugger();
	}
}





