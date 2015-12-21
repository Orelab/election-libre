<?php include( APPPATH . '/views/header.php' ); ?>

<section id="votes" title="Votes enregistrés">

	<?php if( count($votes) ): ?>
	
	<table>
		<thead>
			<tr>
				<th>Empreinte</th>
				<th>Vote</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		
		<tbody>
			<?php foreach( $votes as $v ): $v=(object)$v; ?>
			<tr>
				<td><?= $v->fingerprint ?></td>
				<td><?= $v->vote ?></td>
				<td>
				<!--	<button class="send <?=$v->id ?>">invit</button>	-->
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<?php else : ?>
	
	<p>Aucun vote.</p>
	
	<?php endif; ?>	


</section>


<?php include( APPPATH . '/views/footer.php' ); ?>


