<?php include( APPPATH . '/views/header.php' ); ?>

<section id="electors" title="Liste des électeurs">

	<?php if( count($electors) ): ?>
	
	<table>
		<thead>
			<tr>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Adresse email</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		
		<tbody>
			<?php foreach( $electors as $e ): $e=(object)$e; ?>
			<tr>
				<td><?= $e->name ?></td>
				<td><?= $e->surname ?></td>
				<td><?= $e->email ?></td>
				<td>
				<!--	<button class="send <?=$e->id ?>">invit</button>	-->
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<?php else : ?>
	
	<p>Aucun électeur.</p>
	
	<?php endif; ?>	


</section>


<?php include( APPPATH . '/views/footer.php' ); ?>


