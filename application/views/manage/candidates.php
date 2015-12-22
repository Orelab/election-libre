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
				<td><input type="text" name="candidate-<?= $c->id ?>" value="<?= $c->value ?>" /></td>
				<td>
					<button class="save-<?=$c->id ?>">Save</button>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
		
		<tfoot>
			<tr>
				<td><input type="text" name="candidate-new" value="" /></td>
				<td>
					<button class="new">New</button>
				</td>
			</tr>
		</tfoot>
	</table>

	<?php else : ?>
	
	<p>Aucun candidat.</p>
	
	<?php endif; ?>	

</section>


<?php include( APPPATH . '/views/footer.php' ); ?>


