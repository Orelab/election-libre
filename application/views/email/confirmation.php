
<?=lang('email_confirmation_intro') ?>

<ul>
	<li><?=lang('email_confirmation_identifier') ?> : <b><?= $public_id ?></b></li>
	<li><?=lang('email_confirmation_signature') ?> : <b><?=lang('email_confirmation_signature_value') ?></b></li>
	<li><?=lang('email_confirmation_fingerprint') ?> : <b><?= $fingerprint ?></b></li>
</ul>

<br/>

<p style="text-align: center">
<a href="{unwrap}<?= site_url() . 'vote/result/' . $fk_election ?>{/unwrap}"
	style="margin:auto; padding:10px; background-color:#dceaff; border:1px darkGrey solid; border-radius:4px; text-decoration:none;">
	<?=lang('email_confirmation_vote_list') ?>
</a></p>

<p style="text-align: center"><?=lang('email_confirmation_availability') ?> <?= date( lang('email_confirmation_availability_date'), strtotime($end)) ?>.</p>

<hr/>

<br/>
<p style="text-align: center"><a href="http://www.election-libre.com">www.election-libre.com</a></p>