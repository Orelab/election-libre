<?php defined('BASEPATH') OR exit('No direct script access allowed');

$CI =& get_instance();

if( ! $CI->input->is_ajax_request() ):

?>
	</main>

	<footer>
		<?php /*
		<p class="footer">Page générée en <strong>{elapsed_time}</strong> secondes. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
		*/ ?>

		<p><?=lang('footer_row1')?></p>
		<p><?=lang('footer_row2')?></p>
		<p><?=lang('footer_row3')?></p>

		<br/>

		<nav>
			<a href="<?php echo site_url() ?>manage"><?=lang('footer_administration')?></a>
			<a href="<?php echo site_url() ?>misc/logout"><?=lang('footer_logout')?></a>
			<a href="<?php echo site_url() ?>cms/disclaimer"><?=lang('footer_advertissment')?></a>
			<a href="<?php echo site_url() ?>cms/credits"><?=lang('footer_credits')?></a>
		</nav>
		
		<a href="http://www.kanope-scae.com">
			<img src="<?php echo site_url() ?>assets/img/kanope.png" alt="Kanopé" />
		</a>
		<a href="http://http://www.cooperer.coop/">
			<img src="<?php echo site_url() ?>assets/img/cpe.png" alt="Coopérer pour entreprendre" />
		</a>
		<a href="http://europa.eu">
			<img src="<?php echo site_url() ?>assets/img/europe.png" alt="Europe" />
		</a>
		<a href="http://www.idee-lab.fr">
			<img src="<?php echo site_url() ?>assets/img/idee-lab.png" alt="Idée Lab" />
		</a>
		
		<br/>

		<div id="lang">
			<img src="<?php echo site_url() ?>assets/img/flag_GB.gif" alt="English" />
			<img src="<?php echo site_url() ?>assets/img/flag_FR.gif" alt="French" />
<!-- soon :
			<img src="<?php echo site_url() ?>assets/img/flag_DE.gif" alt="German" />
			<img src="<?php echo site_url() ?>assets/img/flag_ES.gif" alt="Spanish" />
-->
		</div>
		
		<textarea id="console"><?php print_r( $this->session->all_userdata() ); ?></textarea>
		
	</footer>


	
	<?php
	
	$CI =& get_instance();
	$CI->lang->load( 'el_javascript' );
	$jslang = $CI->lang->language;


	// Filtering translations and keeping only JS values

	foreach( $jslang as $key => $val )
	{
		if( substr($key,0,3) != 'js_' )
		{
			unset( $jslang[$key] );
		}
	}
	
	// Appending some usefull values
	
	$jslang['js_lang'] = $CI->config->item( 'language' );
	$jslang['js_root'] = site_url();
	
	?>
	
	
	<span id="translations"><?php echo json_encode( $jslang ) ?></span>

</body>
</html>

<?php endif; ?>
