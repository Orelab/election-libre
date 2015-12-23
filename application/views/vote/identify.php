<?php include( APPPATH . '/views/header.php' ); ?>

<section id="vote">
	
	<fieldset id="identify">
		<legend><?=lang('vote_identify')?></legend>
		
		<label for="publicid"><?=lang('vote_public_id')?></label>
		<input type="text" name="publicid" value="<?php if( isset($public_id) ) echo $public_id ?>" />
		<br/>
		
		<label for="name"><?=lang('vote_name')?></label>
		<input type="text" name="name" value="" />
		<br/>
		
		<label for="surname"><?=lang('vote_surname')?></label>
		<input type="text" name="surname" value="" />

		<aside>
			<p><a href=""><?=lang('vote_lost_invitation')?></a></p>
			<br/>

			<button class="vote/form"><?=lang('vote_next')?></button>
		</aside>
	</fieldset>
	

</section>



<?php include( APPPATH . '/views/footer.php' ); ?>
