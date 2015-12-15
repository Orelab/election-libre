
<p>Nous avons bien enregistré que vous avez voté. Nous avons aussi enregistré votre bulletin, sur
lequel nous avons apposé votre empreinte anonyme. Celle-ci a été calculée à partir de vos identifiants
et de votre signature secrète. C'est une image non décodable de ces deux valeurs qui est apposée sur 
votre bulletin.</p>

<p>Seule une personne connaissant votre signature et vos identifiants est capable de reconnaître votre 
empreinte. Cela dit, vous seul êtes en mesure de reconnaître votre bulletin, car nous n'enregistrons 
jamais <i>qui</i> vote <i>quoi</i>.</p>

<p style="text-align: center">identifiant + signature secrète = l'empreinte anonyme sur votre bulletin</p>

<p>Si vous le souhaitez, vous pouvez accéder à la liste des votes, et en profiter pour vérifier que 
votre bulletin n'a pas été modifié, grâce à votre signature secrète.</p>

<ul>
	<li>votre identifiant : <b><?= $public_id ?></b></li>
	<li>votre signature : <b>[nous ne la connaissons pas]</b></li>
	<li>l'empreinte de votre bulletin : <b><?= $fingerprint ?></b></li>
</ul>

<br/>

<p style="text-align: center">
<a href="{unwrap}<?= site_url() . 'vote/result/' . $fk_election ?>{/unwrap}"
	style="margin:auto; padding:10px; background-color:#dceaff; border:1px darkGrey solid; border-radius:4px; text-decoration:none;">
	Voir la liste des votes
</a></p>

<p style="text-align: center">Les résultats seront disponibles sur cette même page à partir du <?= date('d/m à H:i', strtotime($end)) ?>.</p>

<hr/>

<br/>
<p style="text-align: center"><a href="http://www.election-libre.com">www.election-libre.com</a></p>