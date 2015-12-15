<?php

//	using a PHP variable prevent some minor HTML problems with carriage returns

$info = "Une suite de caractères contenant lettres, chiffres, caractères spéciaux, signifiant "
			. "quelque chose ou non... absolument ce que vous voulez, du moment que vous pouvez " 
			. "le retenir si vous souhaitez vérifier votre votre plus tard !";
		
?>
	<fieldset id="sign">
		<legend>Signez</legend>
	
		<h2>Veuillez lire attentivement la suite</h2>
	
		<p>Nous n'enregistrerons jamais votre <b>clé personnelle</b>. En revanche, 
		nous allons l'utiliser afin de rendre votre bulletin de vote parfaitement anonyme.</p>
	
		<p>Par ailleurs, vous pourrez utiliser votre clé personnelle pour vérifier
		<b>à tout moment</b> la validité de votre vote, y comprs après la cloture des élections.</p>
		<br/>
		
		<label for="signature">votre clé personnelle</label>
		<input type="password" name="signature" value="" title="<?= $info ?>"/>

		<aside>
			<button class="vote/thank">Glisser dans l'urne</button>
		</aside>
	</fieldset>