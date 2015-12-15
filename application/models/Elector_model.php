<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Elector_model extends CI_Model
{

	/*
	 *
	 *	@param string $email : 
	 *	@param boolean $active : if set to true, only users concerned by a non 
	 *									terminated election will be returned.
	 *
	 */
	public function get( $id=null, $email=null, $active=false )
	{
		if( ! isset($id) && ! isset($email) )
		{
			return false;
		}

		if( $id )
		{
			$this->db->where('elector.id', $id );
		}

		if( $email )
		{
			$this->db->where('email', $email );
		}

		if( $active )
		{
			$this->db->where('end >', time() );
		}

		return $this->db
			->from('elector')
			->join( 'election', 'elector.fk_election = election.id' )
			->get()
			->result_array();
	}
	
	
	public function exists( $public_id, $name, $surname )
	{
		if( ! isset($public_id) ) return false;
		if( ! isset($name) ) return false;
		if( ! isset($surname) ) return false;
		
		return $this->db
			->select(array(
						'elector.id', 'name', 'surname', 'public_id', 
						'fk_election', 'business', 'winners', 'title', 
						'page', 'start', 'end', 'voted'
					))
			->from('elector')
			->where( array(
						'LOWER(public_id)' => trim( strtolower($public_id) ),
						'LOWER(name)' => trim( strtolower($name) ),
						'LOWER(surname)' => trim( strtolower($surname) )
				))
			->join( 'election', 'elector.fk_election = election.id' )
			->get()
			->result_array();
	}
	

	/*
	 *	Remember that the elector as previously voted
	 */	
	public function voted( $id )
	{
		$this->db
			->where( 'id', $id )
			->set( 'voted', 'voted+1', false)
			->update( 'elector' );
			
		$res = $this->db
			->select( 'voted' )
			->from( 'elector' )
			->where( 'id', $id )
			->get()
			->row();
		
		return $res->voted;
	}


	public function count( $id=null )
	{
		if( $id )
		{
			$this->db->where('fk_election', $id);
		}
		
		$this->db->from('elector');
		
		return $this->db->count_all_results();
	}

	    
	public function save( $data, $fk )
	{
		foreach( $data as $d )
		{
			$d['fk_election'] = $fk;
			
			
			if( ! $this->db->insert('elector',$d) )
			{
				return false;
			}
		}
		return true;
	}
	
	
	public function delete( $fk_election=null )
	{
		if( $fk_election )
			$this->db->delete('elector', array('fk_election'=>$fk_election) ); 
			else
			$this->db->query( 'TRUNCATE elector;' );
	}


}






       