<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Election_model extends CI_Model
{
	
	
	function __construct()
	{
		parent::__construct();
	}



	public function count( $id=null )
	{
		if( $id )
		{
			$this->db->where('id', $id);
		}
		
		$this->db->from('election');
		
		return $this->db->count_all_results();
	}
	
	
	public function get( $id=null, $with_statistics=false )
	{
		if( $id )
		{
			$this->db->where('id', $id);
		}
		
		$recordset = $this->db->get('election')->result_array();

		if( $with_statistics )
		{
			$this->load->model('Candidate_model');
			$this->load->model('Elector_model');
			$this->load->model('Vote_model');

			foreach( $recordset as $key => $val )
			{
				$num_candidates = $this->Candidate_model->count( $val['id'] );
				$num_electors = $this->Elector_model->count( $val['id'] );
				$num_votes = $this->Vote_model->count( $val['id'] );

				$recordset[$key]['num_candidates'] = $num_candidates;
				$recordset[$key]['num_electors'] = $num_electors;
				$recordset[$key]['num_votes'] = $num_votes;
			}
		}
		
		return $recordset;
	}


	    
	public function save( $data )
	{
		return $this->db->insert('election',$data) ? $this->db->insert_id() : false;
	}
	
	
	public function delete( $id=null )
	{
		if( $id )
			$this->db->delete('election', array('id'=>$id) ); 
			else
			$this->db->query( 'TRUNCATE election;' );
	}
}






       