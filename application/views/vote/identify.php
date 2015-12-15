<?php include( APPPATH . '/views/header.php' ); ?>

<section id="vote">
	
	<fieldset id="identify">
		<legend>Identifiez-vous</legend>
		
		<label for="publicid">Identifiant public</label>
		<input type="text" name="publicid" value="<?php if( isset($id) ) echo $id ?>" />
		<br/>
		
		<label for="name">Prénom</label>
		<input type="text" name="name" value="" />
		<br/>
		
		<label for="surname">Nom</label>
		<input type="text" name="surname" value="" />

		<aside>
			<p><a href="">Je n'ai pas reçu mon mail d'invitation</a></p>
			<br/>

			<button class="vote/form">Suite</button>
		</aside>
	</fieldset>
	

</section>



<?php include( APPPATH . '/views/footer.php' ); ?>
