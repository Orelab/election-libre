########################
What is Election Libre ?
########################

Election Libre is a software you can use to rule an election for your organisation 
or whatever else. For the moment, consider this program is in eavy development.

************
Installation
************

=================
Base installation
=================

Create a MySQL database with the script located in the database/ folder, and edit 
the configuration files located in the application/config/ folder.

For a proper (and safer) installation, we advise to place the index.php and assets/
folder in a subfolder (for example web/). This folder will be the root of your web
hosting. In addition, you'll have to update index.php as following :

	$system_path = '../system';
	
	$application_folder = '../application';
	
Please, see Code Igniter for more information about that.

======================================
Installing in a production environment
======================================

If you want to use it in a secure way, you should probably want to hide the console
located in the footer. In that way, you'll have to add a variable in Apache2 :

	SetEnv CI_ENV production
	
You should also remove the file **application/controller/Admin.php** as it is
barelly useful.

*******************
Server Requirements
*******************

To run the app, you need a webserver which comply with Code Igniter requirements :

 - PHP 5.1.6 or newer
 - A Database server (MySQL (4.1+), MySQLi, MS SQL, Postgres, Oracle, SQLite, ODBC)

That said, PHP version 5.4 or newer is recommended.

It should work on previous versions as well, but we strongly advise you NOT to run
such old versions of PHP, because of potential security and performance
issues, as well as missing features.