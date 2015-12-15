
	<fieldset id="choice">	
		<legend>Votez</legend>
		
		<div>
			<p>

			<?php foreach( $candidates as $c ): ?>
			
				<input type="radio" name="vote" value="<?= $c['id'] ?>" />
				<span><?= $c['value'] ?></span>
				<br/>
							
			<?php endforeach; ?>

			</p>
		</div>

		<aside>
			<button class="vote/sign">Confirmer mon choix</button>
		</aside>
	</fieldset>