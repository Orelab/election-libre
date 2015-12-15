<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Security_model extends CI_Model
{
	    
	public function log( $action )
	{
		return $this->db->insert( 'security', array(
			'IP'				=> $this->input->ip_address(),
			'user_agent'	=> $this->input->user_agent(),
			'session_id'	=> session_id(),
			'session'		=> json_encode( $this->session->all_userdata() ),
			'url'				=> $this->uri->uri_string(),
			'action'			=> $action
		));
	}
	
	
	public function control()
	{
		if( ! session_id() )
		{
			return false;
		}

		$this->db->from( 'security' );

		$this->db->where(array(
			'IP'				=> $this->input->ip_address(),
			'user_agent'	=> $this->input->user_agent(),
			'session_id'	=> session_id()
		));

		return ( $this->db->count_all_results() < $this->config->item('security_tolerance') );
	}
	

}






       