

<div style="max-width: 600px">
	
	<p>Thank you for using Election-libre ! Your elections are now on rails and will start at the date you specified.</p>
	
	<p>Veuillez noter que durant la période ouverte aux votes, vous ne pourrez pas modifier le cours des élections.</p>
	
	<p>You can manage your election with the following private access. Please, don't share it !</p>
	
	<ul>
		<li><b>address : </b><a href="{unwrap}<?= site_url() ?>'manage/index/'{/unwrap}"><?= site_url() ?>manage/index</a></li>
		<li><b>login :</b><?= $data['admin_email'] ?></li>
		<li><b>password :</b><?= $data['admin_password'] ?></li>
	</ul>
	
	<div style="text-align:right;">
		<p style="display:inline-block; max-width:300px; text-align:left;">
			Best regards,<br/>
			<i>The <b>Election Libre</b> team</i>
		</p>
	</div>

</div>