<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Security_model extends CI_Model
{
	    
	public function log( $action, $weight=1 )
	{
		return $this->db->insert( 'security', array(
			'IP'				=> $this->input->ip_address(),
			'user_agent'	=> $this->input->user_agent(),
			'session_id'	=> session_id(),
			'session'		=> json_encode( $this->session->all_userdata() ),
			'url'				=> $this->uri->uri_string(),
			'action'			=> $action,
			'weight'			=> $weight
		));
	}
	
	
	/*
	 *	Return true if no problem
	 */
	public function control()
	{
		if( ! session_id() )
		{
			return false;
		}

		$row = $this->db
			->select( 'SUM(weight) AS sum' )
			->from( 'security' )
			->where(array(
				'IP'				=> $this->input->ip_address(),
				'user_agent'	=> $this->input->user_agent(),
				'session_id'	=> session_id(),
				'timestamp >'	=> date('Y-m-d H:i:s', time()-(60*60*24) )	// logs from the last 24 hours only
			))
			->group_by( 'weight' )
			->get()
			->row();

		if( ! $row )
		{
			return true; // empty query : no problem
		}

		if( ! isset($row->sum) )
		{
			return false; // query error
		}
		
		return ( $row->sum < $this->config->item('security_tolerance') );
	}
	

}






       