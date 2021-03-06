<?php defined('BASEPATH') OR exit('No direct script access allowed');



class EL_Loader extends CI_Loader
{

	/*
	 *	If the needed view exists in a subfolder of the current language, we'll use it instead.
	 *	Note that the folder tree must be the same inside the language folder. Otherwise, we'll
	 *	ues the original file for generation. For example :
	 *
	 *	application/views/english/cms/index.php
	 *		will replace :
	 *	application/views/cms/index.php
	 *
	 *
	 *	Note that this technique is a second way to traduce the website. The main way consists
	 *	using translation files (located in application/language). The bad stuff with this
	 *	technique is that it requires a lot of code and make it hard to maintain. 
	 */
	 
	public function view($view, $vars = array(), $return = FALSE)
	{
		global $view_folder;
/*
		$CI =& get_instance();
		$lang = $CI->security->sanitize_filename( $CI->config->item('language') );

		if( file_exists($view_folder.$lang.'/'.$view.'.php') )
		{
			$view = $lang.'/'.$view;
		}
*/
		return parent::view($view,$vars,$return);
	}
	

}




