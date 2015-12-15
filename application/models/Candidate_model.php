<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Candidate_model extends CI_Model
{
	
	
	function __construct()
	{
		parent::__construct();
	}
	
	
	
	public function get( $fk_election )
	{
		return $this->db
			->select('*')
			->from('candidate')
			->where('fk_election', $fk_election )
			->get()
			->result_array();
	}



	public function count( $id=null )
	{
		if( $id )
		{
			$this->db->where('fk_election', $id);
		}
		
		$this->db->from('candidate');
		
		return $this->db->count_all_results();
	}


	    
	public function save( $data, $fk )
	{
		foreach( $data as $d )
		{
			$row = array(
				'fk_election' => $fk,
				'value' => $d
			);
			
			if( ! $this->db->insert('candidate',$row) )
			{
				return false;
			}
		}
	}
	
	
	public function delete( $fk_election=null )
	{
		if( $fk_election )
			$this->db->delete('candidate', array('fk_election'=>$fk_election) ); 
			else
			$this->db->query( 'TRUNCATE candidate;' );
	}




}






       