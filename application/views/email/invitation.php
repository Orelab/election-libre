
<div style="max-width: 600px">
	
	<?= $message ?>
	
	<hr/>
	
	<ul>
		<li><?=lang('email_invitation_start')?> <?= date( lang('email_invitation_start_date'), strtotime($start)) ?></li>
		<li><?=lang('email_invitation_end')?> <?= date( lang('email_invitation_end_date'), strtotime($end)) ?></li>
	</ul>
	
	
	<p style="text-align: center">
	<a href="{unwrap}<?= site_url() . 'vote/index/' . $public_id ?>{/unwrap}"
		style="margin:auto; padding:10px; background-color:#dceaff; border:1px darkGrey solid; border-radius:4px; text-decoration:none;">
		<?=lang('email_invitation_go_vote')?>
	</a></p>
	
	<br/>
	<p style="text-align: center"><a href="http://www.election-libre.com">www.election-libre.com</a></p>
	
</div>