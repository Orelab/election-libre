<?php defined('BASEPATH') OR exit('No direct script access allowed');


/*
 *	Some actions are limited in quantity per day for security reasons :
 *	 - re-send a lost invitation (3)
 *	 - create an election (3)
 *	 - converting CSV to JSON (1)
 *	 - checking an email (1)
 *
 *	The use of these actions are recorded in the 'security' table. 
 *
 */
$config['security_tolerance'] = 25;



