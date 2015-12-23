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
 *	default : 25
 *
 */
$config['security_tolerance'] = 25;


/*
 *	The sum of all actions will be calculated in the period defined
 *	between now and the seconds listed here. If a user is banned, 
 *	he will be allowed to come back quickest if the value is lower.
 *
 *	default : 6 hours
 *
 */
$config['security_period'] = 60 * 60 * 6;



