<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Vote extends EL_Controller
{
	
	public function __construct()
	{
		parent::__construct();

		$this->lang->load( 'el_vote' );
	}


	public function index()
	{
		$public_id = $this->security->xss_clean( $this->uri->segment(3) );

		$this->load->view( 'vote/identify', array('public_id'=>$public_id) );
	}
	
	
	public function sendmail()
	{
		// Security stuffs
		
		$this->load->model( 'Security_model') ;
		$this->Security_model->log( 'invitation lost', 3 );


		// generate/send email
		
		$this->lang->load( 'el_mail' );

		$email = $this->input->post( 'email', true );
		
		$this->load->model( 'Elector_model' );
		$electors = $this->Elector_model->get( null, $email );

		foreach( $electors as $e )	// The same elector can be registered on many elections
		{
			$mail = array(
				'subject' => $e['title'],
				'message' => $this->load->view('email/resend-invitation', array(
									'message' => $e['page'],
									'public_id' => $e['public_id'],
									'start' => $e['start'],
									'end' => $e['end']
								), true),
				'fromEmail' => $e['admin_email'],
				'fromName' => $e['admin_name'] . ' ' . $e['admin_surname'],
				'fromBusiness' => $e['business'],
				'toEmail' => $e['email'],
				'toName' => $e['name'] . ' ' . $e['surname'],
			);
			
			if( ! sendmail($mail) )
			{
				die_error( 'mailer_problem' );
			}
		}
		die( lang('vote_check_mailbox') );
	}
	

	public function form()
	{
		$public_id = $this->input->post( 'publicid', true );
		$name = $this->input->post( 'name', true );
		$surname = $this->input->post( 'surname', true );
		
		$this->load->model( 'Elector_model' );

		$elector = $this->Elector_model->exists( $public_id, $name, $surname );
	
		if( count($elector) != 1 )
		{
			die( 'Connexion error.' );
		}

		$this->session->set_userdata( 'data', $elector[0] );

		$data = $elector[0];
		
		if( $data['voted'] == 1 )
		{
			die( 'Sorry, your vote as been recorded yet.' );
		}
		
		if( time() < strtotime($data['start']) )
		{
			die( 'Voting is allowed from ' . $data['start'] );
		}

		if( time() > strtotime($data['end']) )
		{
			die( 'Voting are now closed.' );
		}

		$this->load->model('Candidate_model');
		
		$this->load->view( 'vote/form', array(
			"candidates" => $this->Candidate_model->get( $data['fk_election'] )
		));
	}
	
	
	public function sign()
	{
		$vote = $this->input->post( 'vote', true );
		$this->session->set_userdata( 'vote', $vote );

		$this->load->view( 'vote/sign' );
	}
	
	
	public function thank()
	{
		$signature = $this->input->post( 'signature', true );
		$data = $this->session->userdata( 'data' );


		// check if a previous vote exists
		//	Note that $this->Elector_model->voted() also increments the 'voted' counter
		
		$this->load->model('Elector_model');
		$num_votes = $this->Elector_model->voted( $data['id'] );
		
		if( $num_votes > 1 )
		{
			die( lang('vote_once') );
		}


		// sign and save the vote
		//	The signature is used as a salt in the calculation of the fingerprint
		// Fingerprint is saved, but not signature.

		$fingerprint = md5( trim(strtolower($data['name'])) . trim(strtolower($data['surname'])) . $signature );

		$this->load->model('Vote_model');
		
		$this->Vote_model->save(array(
			'fk_election' => $data['fk_election'],
			'fingerprint' => $fingerprint,
			'vote' => $this->session->get_userdata( 'vote' )
		));


		// Send a confirmation mail to the elector with its fingerprint, for later verification

		$this->lang->load( 'el_mail' );

		$user = $this->Elector_model->get( $data['id'] );

		if( count($user) )
		{
			$user = $user[0];
		}

		$mail = array(
			'subject' => 'Congratulation, your vote is effective !',
			'message' => $this->load->view('email/confirmation', array(
									'public_id' => $data['public_id'],
									'fingerprint' => $fingerprint,
									'end' => $data['end'],
									'fk_election' => $data['fk_election']
								), true),
			'toEmail' => $user['email'],
			'toName' => $user['name'] . ' ' . $user['surname'],
		);
		
		if( ! sendmail($mail) )
		{
			die_error( 'mailer_problem' );
		}

		$this->session->sess_destroy();
		
		$this->load->view( 'vote/thank' );
	}
	
	
	
	public function result()
	{
		$id = $this->security->xss_clean( $this->uri->segment(3) );

		$this->load->model('Election_model');
		$this->load->model('Vote_model');
		
		//	Voting period is not over, votes and results are not yet accessible
		
		$election = $this->Election_model->get( $id );

		if( count($election) == 1 )
			$election = $election[0];
			else
			die_error( 'bad_identifier' );

		if( time() < strtotime($election['end']) )
		{
			die_error( 'too_early' );		
		}


		// draw the results, votes and verification form
				
		$this->load->view( 'vote/result', array(
			'result' => $this->Vote_model->result( $id ),
			'votes' => $this->Vote_model->get( $id )
		));
	}
	
	
	public function fingerprint()
	{
		$name = $this->input->post( 'name', true );
		$surname = $this->input->post( 'surname', true );
		$signature = $this->input->post( 'signature', true );
		
		die( md5( trim(strtolower($name)) . trim(strtolower($surname)) . $signature ) );
	}
	
}





