<?php include( APPPATH . '/views/header.php' ); ?>


<section id="result">


	<fieldset id="winner">
		<legend><?=lang('vote_result') ?></legend>

		<?php if( count($result) ): ?>
		
			<table>
				<tr>
					<th><?=lang('vote_candidate') ?></th>
					<th><?=lang('vote_ballot') ?></th>
				</tr>
				
				<?php foreach( $result as $r ): ?>
				
				<tr>
					<td><?=$r['candidate'] ?></td>
					<td><?=$r['suffrage'] ?></td>
				</tr>
				
				<?php endforeach ?>
			</table>
			
		<?php else: ?>
		
			<p><?=lang('vote_result_unavailable') ?></p>
		
		<?php endif; ?>
	</fieldset>

	

	<fieldset id="votelist">
		<legend><?=lang('vote_ballot_list') ?></legend>

		<?php if( count($votes) ): ?>
	
			<table>
				<tr>
					<th><?=lang('vote_fingerprint') ?></th>
					<th><?=lang('vote_ballot') ?></th>
					<th><?=lang('vote_count') ?></th>
				</tr>
				
				<?php foreach( $votes as $key => $v ): ?>
				
				<tr>
					<td><?=$v['fingerprint'] ?></td>
					<td><?=$v['value'] ?></td>
					<td><?= $v + 1 ?></td>
				</tr>
				
				<?php endforeach ?>
			</table>
			
		<?php else: ?>
		
			<p><?=lang('vote_no_vote') ?></p>
		
		<?php endif; ?>
	</fieldset>
	
	


	<?php if( count($votes) ): ?>
	
		<fieldset id="checkup">
			<legend><?=lang('vote_check') ?></legend>
		
			<p><?=lang('vote_check_detail') ?></p>
			<table>
				<tr>
					<th><?=lang('vote_name') ?></th>
					<td><input type="text" name="name" value="" /></td>
				</tr>
				<tr>
					<th><?=lang('vote_surname') ?></th>
					<td><input type="text" name="surname" value="" /></td>
				</tr>
				<tr>
					<th><?=lang('vote_signature') ?></th>
					<td><input type="password" name="signature" value="" /></td>
				</tr>
				<tr>
					<td colspan="2"><button><?=lang('vote_fingerprint_calculation') ?></button></td>
				</tr>
				<tr>
					<th><?=lang('vote_fingerprint') ?></th>
					<td><input type="text" name="fingerprint" value="" readonly /></td>
				</tr>
			</table>
	
		</fieldset>
	
	<?php endif; ?>
	
	
</section>



<?php include( APPPATH . '/views/footer.php' ); ?>

	