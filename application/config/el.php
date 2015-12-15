<?php defined('BASEPATH') OR exit('No direct script access allowed');


/*
 *	Some actions are limited in quantity per day for security reasons :
 *	 - send a mail (lost password)
 *	 - create an election
 *
 *	The use of these actions are recorded in the 'security' table. 
 *
 */
$config['security_tolerance'] = 5;



