<?php include( APPPATH . '/views/header.php' ); ?>

<section id="vote">
	
	<fieldset id="identify">
		<legend><?=lang('manage_identify')?></legend>
		
		<label for="email"><?=lang('manage_email')?></label>
		<input type="text" name="email" value="<?php if( isset($id) ) echo $id ?>" />
		<br/>
		
		<label for="password"><?=lang('manage_password')?></label>
		<input type="text" name="password" value="" />
		<br/>

		<aside>
			<button class="manage/dashboard"><?=lang('manage_connection')?></button>
		</aside>
	</fieldset>
	

</section>



<?php include( APPPATH . '/views/footer.php' ); ?>
