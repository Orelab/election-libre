<?php include( APPPATH . '/views/header.php' ); ?>

<section id="candidates" title="Liste des candidats">

	<?php if( count($candidates) ): ?>
	
	<table>
		<thead>
			<tr>
				<th>Nom</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		
		<tbody>
			<?php foreach( $candidates as $c ): $c=(object)$c; ?>
			<tr>
				<td><?= $c->value ?></td>
				<td>
				<!--	<button class="send <?=$c->id ?>">invit</button>	-->
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<?php else : ?>
	
	<p>Aucun candidat.</p>
	
	<?php endif; ?>	

</section>


<?php include( APPPATH . '/views/footer.php' ); ?>


