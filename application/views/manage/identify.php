<?php include( APPPATH . '/views/header.php' ); ?>

<section id="vote">
	
	<fieldset id="identify">
		<legend>Identifiez-vous</legend>
		
		<label for="email">Adresse email</label>
		<input type="text" name="email" value="<?php if( isset($id) ) echo $id ?>" />
		<br/>
		
		<label for="password">Mot de passe</label>
		<input type="text" name="password" value="" />
		<br/>

		<aside>
			<button class="manage/dashboard">Connexion</button>
		</aside>
	</fieldset>
	

</section>



<?php include( APPPATH . '/views/footer.php' ); ?>
