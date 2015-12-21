

<div style="max-width: 600px">
	
	<?=lang('email_creation_intro')?>
	
	<ul>
		<li><b><?=lang('email_creation_address')?> : </b><a href="{unwrap}<?= site_url() ?>manage{/unwrap}"><?= site_url() ?>manage</a></li>
		<li><b><?=lang('email_creation_login')?> : </b><?= $data['admin_email'] ?></li>
		<li><b><?=lang('email_creation_password')?> : </b><?= $password ?></li>
	</ul>
	
	<div style="text-align:right;">
		<p style="display:inline-block; max-width:300px; text-align:left;">
			<?=lang('email_creation_best_regards')?>,<br/>
			<?=lang('email_creation_el_team')?>
		</p>
	</div>

</div>