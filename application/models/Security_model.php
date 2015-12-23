<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Security_model extends CI_Model
{
	  
	/*
	 *	This method is used to control user abuse. In case of excessive call
	 *	to some sensible pages, the user risk to be banned until he waits 
	 *	enougth time to be considered as a non spammer.
	 *
	 *	Technically, the call of this method will generate a row in the security
	 *	log table. In a second time, a call to $this->control() will tell if the
	 *	user is considered as a spamer or not (be bellow for more explanation). 
	 *
	 */
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
	 *	This method should be called each time a controller method is called.
	 *	In fact it is used only in core/El_Controller.php 's constructor, which
	 *	mean it is called every time.
	 *
	 *	The method compare the user parameter in the config file config/el.php.
	 *	If the sum of all recorded sensitive actions is higher than the authorized
	 *	amount in the configuration, the user will be rejected.
	 *
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
				'timestamp >'	=> date('Y-m-d H:i:s', time()  - $this->config->item('security_tolerance') )	// logs from the last 24 hours only
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






       