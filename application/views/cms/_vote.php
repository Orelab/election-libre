<?php include( APPPATH . '/views/header.php' ); ?>

<section id="vote">
	
	<fieldset id="elector">
		<legend>Identifiez-vous</legend>
		
		<label for="publicid">Identifiant public</label>
		<input type="text" name="publicid" value="<?= $id ?>" />
		<br/>
		
		<label for="surname">Prénom</label>
		<input type="text" name="surname" value="" />
		<br/>
		
		<label for="name">Nom</label>
		<input type="text" name="name" value="" />

		<aside>
			<p><a href="">Je n'ai pas reçu mon mail d'invitation</a></p>
			<br/>

			<button class="next">Suite</button>
		</aside>
	</fieldset>
	
	
	<fieldset id="choice">	
		<legend>Votez</legend>
		
		<input type="checkbox" name="choice1" value="" />
		<label for="choice1">blabla 1</label>
		<br/>
		
		<input type="checkbox" name="choice2" value="" />
		<label for="choice2">blabla 2</label>
		<br/>
		
		<input type="checkbox" name="choice3" value="" />
		<label for="choice3">blabla 3</label>
		<br/>
		
		<input type="checkbox" name="choice4" value="" />
		<label for="choice4">blabla 4</label>
		<br/>

		<aside>
			<button class="prev">Retour</button>
			<button class="next">Suite</button>
		</aside>
	</fieldset>
		
	
	<fieldset id="sign">
		<legend>Signez</legend>
	
		<h2>Veuillez lire attentivement la suite</h2>
	
		<p>Nous n'enregistrerons jamais votre <b>clé personnelle</b>. En revanche, 
		nous allons l'utiliser afin de rendre votre bulletin de vote parfaitement anonyme.</p>
	
		<p>Par ailleurs, vous pourrez utiliser votre clé personnelle pour vérifier
		<b>à tout moment</b> la validité de votre vote, y comprs après la cloture des élections.</p>
		<br/>
		
		<label for="salt">votre clé personnelle</label>
		<input type="text" name="salt" value="" title="Une suite de caractères contenant lettres, 
		chiffres, caractères spéciaux, signifiant quelque chose ou non... absolument ce que vous voulez, 
		du moment que vous pouvez le retenir si vous souhaitez vérifier votre votre plus tard !"/>

		<aside>
			<button class="prev">Retour</button>
			<button class="next">Suite</button>
		</aside>
	</fieldset>
		
	
	<fieldset id="thanks">	
		<legend>Merci  de votre participation !</legend>
	
		<p>Votre vote anonyme a bien été pris en compte. Si vous le souhaitez, vous pouvez vérifier
		le contenu de votre enveloppe a tout moment grâce à votre clé de cryptage personnelle.</p>

		<aside>
			<button class="prev">Retour</button>
		</aside>		
	</fieldset>

</section>



<?php include( APPPATH . '/views/footer.php' ); ?>
