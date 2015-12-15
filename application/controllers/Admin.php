<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends EL_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model( 'Election_model' );
		$this->load->model( 'Candidate_model' );
		$this->load->model( 'Elector_model' );
		$this->load->model( 'Vote_model' );
	}


	public function index()
	{
		$this->load->view('admin/dashboard', array(
			'elections' => $this->Election_model->get( null, true ),
			'candidates' => $this->Candidate_model->count(),
			'electors' => $this->Elector_model->count()
		));
	}
	
	
	public function clear()
	{
		$this->db->trans_start();
		
		$this->Election_model->delete();
		$this->Candidate_model->delete();
		$this->Elector_model->delete();
		$this->Vote_model->delete();

		$this->db->trans_complete();
		
		if( $this->db->trans_status() === false )
			die( 'An error occured during the process.' );
			else
			die( 'cleared.' );
	}
	
	
	public function delete()
	{
		$id = $this->input->post('id', true);
		
		if( ! is_numeric($id) )
		{
			die_error( $id . ' : bad identifier.' );
		}

		$this->Election_model->delete( $id );
		$this->Candidate_model->delete( $id );
		$this->Elector_model->delete( $id );
		$this->Vote_model->delete( $id );
		
		die( 'deleted.');
	}


	public function invitation()
	{
		$id = $this->input->post('id', true);
		
		if( ! is_numeric($id) )
		{
			die_error( $id . ' : bad identifier.' );
		}

		// ...
		
		die( $id . ' not invited.');
	}

}










