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
				<td><input type="text" name="name-<?= $e->id ?>" value="<?= $e->name ?>" /></td>
				<td><input type="text" name="surname-<?= $e->id ?>" value="<?= $e->surname ?>" /></td>
				<td><input type="text" name="email-<?= $e->id ?>" value="<?= $e->email ?>" /></td>
				<td>
					<button class="save-<?=$e->id ?>">Save</button>
					<button class="send-<?=$e->id ?>">invit'</button>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>

		<tfoot>
			<tr>
				<td><input type="text" name="name-new" value="" /></td>
				<td><input type="text" name="surname-new" value="" /></td>
				<td><input type="text" name="email-new" value="" /></td>
				<td>
					<button class="new">New</button>
				</td>
			</tr>
		</tfoot>

	</table>

	<?php else : ?>
	
	<p>Aucun électeur.</p>
	
	<?php endif; ?>	


</section>


<?php include( APPPATH . '/views/footer.php' ); ?>


