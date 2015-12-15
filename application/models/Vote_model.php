<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Vote_model extends CI_Model
{
	
	
	function __construct()
	{
		parent::__construct();
	}




	public function count( $id=null )
	{
		if( $id )
		{
			$this->db->where('fk_election', $id);
		}
		
		$this->db->from('vote');
		
		return $this->db->count_all_results();
	}


	public function get( $fk_election )
	{
		return $this->db
			->from('vote')
			->where('vote.fk_election', $fk_election )
			->join( 'candidate', 'vote.vote = candidate.id' )
			->get()
			->result_array();
	}


	public function result( $fk_election )
	{
		return $this->db
			->select('value as candidate, COUNT(vote) as suffrage', false )
			->from('vote')
			->where('vote.fk_election', $fk_election )
			->join( 'candidate', 'vote.vote = candidate.id' )
			->group_by('value')
			->order_by('suffrage', 'desc')
			->get()
			->result_array();
	}

	    
	public function save( $data )
	{			
		return $this->db->insert( 'vote', $data );
	}
	
	
	public function delete( $fk_election=null )
	{
		if( $fk_election )
			$this->db->delete('vote', array('fk_election'=>$fk_election) ); 
			else
			$this->db->query( 'TRUNCATE vote;' );
	}



	

}






       