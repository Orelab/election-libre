<?php include( APPPATH . '/views/header.php' ); ?>

<section id="dashboard">

	<h1>&nbsp;</h1>

	<?php if( count($elections) ): ?>
	
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>titre</th>
				<th>administrateur</th>
				<th>début</th>
				<th>fin</th>
				<th>candidats</th>
				<th>électeurs</th>
				<th>votes</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		
		<tbody>
			<?php foreach( $elections as $e ): $e = (object)$e; ?>
			<tr>
				<td><?= $e->id ?></td>
				<td title="<?= $e->title ?>"><?= substr($e->title,0,10) . (strlen($e->title)>10 ? '...' : '') ?></td>
				<td title="<?= $e->admin_email ?>"><a href="mailto:<?= $e->admin_email ?>"><?= $e->admin_name . ' ' . $e->admin_surname ?></a></td>
				<td title="<?= $e->start ?>"><?= date('d-m-Y', strtotime($e->start)) ?></td>
				<td title="<?= $e->end ?>"><?= date('d-m-Y', strtotime($e->end)) ?></td>
				<td><a href="manage/candidates/<?= $e->id ?>"><?= $e->num_candidates ?></a></td>
				<td><a href="manage/electors/<?= $e->id ?>"><?= $e->num_electors ?></a></td>
				<td><a href="manage/votes/<?= $e->id ?>"><?= $e->num_votes ?></a></td>
				<td>
				<!--	<button class="send <?=$e->id ?>">invit</button>	-->
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<?php else : ?>
	
	<p>Aucun vote en cours.</p>
	
	<?php endif; ?>	


</section>


<?php include( APPPATH . '/views/footer.php' ); ?>


