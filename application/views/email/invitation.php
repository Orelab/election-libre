
<div style="max-width: 600px">
	
	<?= $message ?>
	
	<hr/>
	
	<ul>
		<li>Démarrage des votes : le <?= date('d/m/y à H:i', strtotime($start)) ?></li>
		<li>Fin des votes : le <?= date('d/m/y à H:i', strtotime($end)) ?></li>
	</ul>
	
	
	<p style="text-align: center">
	<a href="{unwrap}<?= site_url() . 'vote/index/' . $public_id ?>{/unwrap}"
		style="margin:auto; padding:10px; background-color:#dceaff; border:1px darkGrey solid; border-radius:4px; text-decoration:none;">
		aller voter maintenant
	</a></p>
	
	<br/>
	<p style="text-align: center"><a href="http://www.election-libre.com">www.election-libre.com</a></p>
	
</div>