<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Manage extends EL_Controller
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model( 'Election_model' );


		// Registering the user
		
		$email = $this->input->post( 'email' );
		$password = $this->input->post( 'password' );

		if( $email && $password )
		{
			$elections = $this->Election_model->exists( $email, $password, true );
	
			if( gettype($elections)=='array' && count($elections)>0 )
			{
				$this->session->set_userdata( 'admin_email', $elections[0]['admin_email'] );
			}
		}

		//	Language stuffs
		
		$this->lang->load( 'el_manage' );
	}
	


	//	Using the _remap function() to control rights management :
	//
	//	https://ellislab.com/codeigniter/user-guide/general/controllers.html#remapping
		
	public function _remap( $method )
	{
		if( ! in_array( $method, array('index','save') ) )
		{
			if( ! $this->session->userdata('admin_email') )
			{
				$this->session->sess_destroy();
				redirect( 'manage/index' );
				die( 'Wrong identification. Please reload the page.' );
			}
		}

		if( $method == 'index' &&  $this->session->userdata('admin_email') )
		{
			$this->dashboard();
			return;
		}

		 $this->$method();
	}




	public function index()
	{
		$this->load->view( 'manage/identify' );
	}
	
	
	
	
	public function dashboard()
	{
		$email = $this->session->userdata( 'admin_email' );
		
		$this->load->model( 'Election_model' );
		$elections = $this->Election_model->get( null, $email, true );

		$this->load->view('manage/dashboard', array(
			'elections' => $elections
		));

	}
	
	
	
	public function candidates()
	{
		$id = $this->uri->segment(3);
		
		$this->load->model( 'Candidate_model' );
		$candidates = $this->Candidate_model->get( $id );
		
		$this->load->view('manage/candidates', array(
			'candidates' => $candidates
		));
	}
	
	
	
	public function electors()
	{
		$id = $this->uri->segment(3);
		
		$this->load->model( 'Elector_model' );
		$electors = $this->Elector_model->get( null, null, false, $id );
		
		$this->load->view('manage/electors', array(
			'electors' => $electors
		));
	}
	
	
	
	public function votes()
	{
		$id = $this->uri->segment(3);
		
		$this->load->model( 'Vote_model' );
		$votes = $this->Vote_model->get( $id );
		
		$this->load->view('manage/votes', array(
			'votes' => $votes
		));
	}


	


	//	This part saves a new election, with its candidate and electors list.

	public function save()
	{
		// Security stuffs
		
		$this->Security_model->log( 'election creation', 3 );


		// None of these fields must be empty. If it occurs, there is an IHM problem and the procedure
		// should be aborted.
		
		$profile = array(
			'election' => array(
				'admin_name' => '',
				'admin_surname' => '',
				'admin_email' => '',
				'admin_password' => '',
				'business' => '',
				'winners' => '',
				'title' => '',
				'page' => '',
				'start' => '',
				'end' => ''
			),
			'candidates' =>array(),
			'electors' =>array(),
		);
		

		// No need to specify 'true' in the second argument as it is also configured in the config file,
		// but as it is a very important verification, it's better to force it here...

		$data = $this->input->post(null, true);
		$keys = array_keys( $profile['election'] );


		foreach( $data as $key => $value )
		{
			if( $key == 'start' or $key == 'end' )
			{
				//$dt = DateTime::createFromFormat( 'd/m/Y', $value );
				$dt = DateTime::createFromFormat( 'Y/m/d H:i', $value );

				if( $dt )
					$profile['election'][$key] = $dt->format( DateTime::ISO8601 );
					else
					die( 'Date error.' );
			}
			
			elseif( $key == 'page' )
			{
				$profile['election']['page'] = $value;	// the same as below, without strip_tags()
			}
			
			elseif( in_array($key, $keys) )
			{
				$profile['election'][$key] = strip_tags( $value );
			}
			
			elseif( substr($key,0,9) == 'candidate' )
			{
				$profile['candidates'][] = strip_tags( $value );
			}
			
			elseif( in_array( substr($key,0,4), array('name','surn','emai') ) )
			{
				$col = preg_replace('/[0-9]/s', '', $key );
				$row = preg_replace('/[^0-9]/s', '', $key);
				
				$profile['electors'][$row][$col] = strip_tags( $value );
			}
			
			elseif( substr($key,0,5) == 'valid' )
			{
				// We have to ignore explicitly this field, otherwise we trigger
				// an 'unexpected data' error (see bellow)
			}
			
			else
			{
				die_error( 'unexpected data.');
			}
		}
		
		
		// Adding public user ID		
		//
		//	$key_list is used to prevent the generation of two identical keys.
		//		

		$key_list = array();
		
		foreach( $profile['electors'] as &$e )
		{
			$key = random_key();

			while( in_array($key, $key_list) )
			{
				$key = random_key();
			}
			$key_list[] = $key;
			
			$e['public_id'] = $key;
		}		
		
		
		// post treatment validation
		
		foreach( $profile as $value )
		{
			if( $value=='' or ( is_array($value) && count($value)==0 ) )
			{
				die_error( 'missing data.' );
			}
		}

		
		// generate a password for the admin
		//	It will be sent to the admin with its confirmation mail.
		// In the database, only the md5 is saved for security reasons.
		
		$password = random_key();
		$profile['election']['admin_password'] = md5( $password );
		
		
		// Ok, so let's record it
		
		$this->load->model('Election_model');
		$this->load->model('Candidate_model');
		$this->load->model('Elector_model');
		
		$fk = $this->Election_model->save( $profile['election'] );
		$this->Candidate_model->save( $profile['candidates'], $fk );
		$this->Elector_model->save( $profile['electors'], $fk );
		
		
		//  warn the admin
		
		$this->lang->load( 'el_mail' );

		$response = sendmail(array(
			'subject' => 'Congratulations ! Elections are on rails now',
			'message' => $this->load->view('email/creation', array(
								'data'=>$profile['election'],
								'password'=>$password),
							true),
			'toName' => $profile['election']['admin_name'] . ' ' . $profile['election']['admin_surname'],
			'toEmail' => $profile['election']['admin_email']
		));

		if( $response !== true )
		{
			die_error( $response );
		}
		
		
		//  warn the electors
		
		foreach( $profile['electors'] as $elector )
		{
			$mail = array(
				'subject' => $profile['election']['title'],
				'message' => $this->load->view('email/invitation', array(
								'message' => $profile['election']['page'],
								'public_id' => $elector['public_id'],
								'start' => $profile['election']['start'],
								'end' => $profile['election']['end']
							), true),
				'fromName' => 'Election Libre',
				'fromEmail' => $profile['election']['admin_email'],
				'fromBusiness' => $profile['election']['business'],
				'toName' => $elector['name'] . ' ' . $elector['surname'],
				'toEmail' => $elector['email']
			);

			$response = sendmail( $mail );
			
			if( $response !== true )
			{
				die_error( $response );
			}
		}
		
		die( lang('manage_success') );
	}
	


}










