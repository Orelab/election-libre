<?php include( APPPATH . '/views/header.php' ); ?>


<section id="result">


	<fieldset id="winner">
		<legend>Résultats</legend>
	
		<table>
			<tr>
				<th>Candidat</th>
				<th>Suffrages</th>
			</tr>
			
			<?php
			foreach( $result as $r ): ?>
			
			<tr>
				<td><?=$r['candidate'] ?></td>
				<td><?=$r['suffrage'] ?></td>
			</tr>
			
			<?php endforeach ?>
		</table>
	</fieldset>

	

	<fieldset id="votelist">
		<legend>Bulletins de vote</legend>
	
		<table>
			<tr>
				<th>Empreinte</th>
				<th>Vote</th>
				<th>Décompte</th>
			</tr>
			
			<?php
			$i=1; 
			foreach( $votes as $v ): ?>
			
			<tr>
				<td><?=$v['fingerprint'] ?></td>
				<td><?=$v['value'] ?></td>
				<td><?= $i++ ?></td>
			</tr>
			
			<?php endforeach ?>
		</table>
	</fieldset>
	
	
	
	<fieldset id="checkup">
		<legend>Vérification de votre bulletin</legend>
	
		<p>Veillez à bien respecter l'emploi des accents, traits d'unions, majuscules et autres subtilités de votre clavier dans chacun des champs.</p>
		<table>
			<tr>
				<th>Prénom</th>
				<td><input type="text" name="name" value="" /></td>
			</tr>
			<tr>
				<th>Nom</th>
				<td><input type="text" name="surname" value="" /></td>
			</tr>
			<tr>
				<th>Signature</th>
				<td><input type="password" name="signature" value="" /></td>
			</tr>
			<tr>
				<td colspan="2"><button>calculer votre empreinte</button></td>
			</tr>
			<tr>
				<th>Empreinte</th>
				<td><input type="text" name="fingerprint" value="" readonly /></td>
			</tr>
		</table>
		

	</fieldset>
	
	
</section>



<?php include( APPPATH . '/views/footer.php' ); ?>

	