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
	
	
	public function get( $id=null, $email=null, $with_statistics=false )
	{
		if( $id )
		{
			$this->db->where('id', $id);
		}
		
		if( $email )
		{
			$this->db->where('admin_email', $email);
		}
		
		$recordset = $this->db->get('election')->result_array();

		if( $with_statistics )
		{
			$this->addStatsAt( $recordset );
		}
		
		return $recordset;
	}


	public function exists( $email, $password, $with_statistics=false )
	{
		if( ! isset($email) ) return false;
		if( ! isset($password) ) return false;
		
		$recordset = $this->db
			->from('election')
			->where( array(
						'LOWER(admin_email)' => trim( strtolower($email) ),
						'admin_password' => md5( $password )
				))
			->get()
			->result_array();

		if( $with_statistics )
		{
			$this->addStatsAt( $recordset );
		}
			
		return $recordset;
	}
	
	
	private function addStatsAt( &$recordset )
	{
		$this->load->model('Candidate_model');
		$this->load->model('Elector_model');
		$this->load->model('Vote_model');

		foreach( $recordset as $key => $val )
		{
			if( ! isset($val['id']) )
			{
				print_r($val);
				die('STOP');
			}
			$num_candidates = $this->Candidate_model->count( $val['id'] );
			$num_electors = $this->Elector_model->count( $val['id'] );
			$num_votes = $this->Vote_model->count( $val['id'] );

			$recordset[$key]['num_candidates'] = $num_candidates;
			$recordset[$key]['num_electors'] = $num_electors;
			$recordset[$key]['num_votes'] = $num_votes;
		}
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






       