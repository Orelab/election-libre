<?php include( APPPATH . '/views/header.php' ); ?>

<section id="manage">

	<fieldset id="intro">
		<legend>An elegant weapon for a more civilized age</legend>
		
		<p>Que vous soyez organisateur des prochaines élections de votre association,
		que vous ayez en tête de lancer un référendum dans votre entreprise, ou plus simplement
		que vous souhaitiez lancer un questionnaire aux abonnés de votre blog, ou toutes autres
		situations nécessitant de prendre une décision en collectif, vous allez devoir vous lancer
		dans l'organisation d'une élection qui nécessite à la fois logistique contraignante et
		nécessité de rassurer les participants.</p>
		
		<p>Notre système est à la fois simple et ouvert. En quelques minutes, vous pourrez
		créer une élection. Chaque électeur recevra ensuite par email une invitation à voter
		de manière totalement sécurisée et transparente. Les résultats seront ensuite rendus
		publics sur le site, et chaque électeur sera tenu informé par email.</p>
		
		<ul>		
			<li><b>Transparence totale</b> : le code source est public.</li>
			<li><b>Suffrages anonymes</b> : mécanismes de contrôle inclus.</li>
		</ul>
	
		<aside>
			<button class="next">Démarrer</button>
		</aside>
	</fieldset>
	

	<fieldset id="organizer">
		<legend>Vos coordonnées</legend>
		
		<p>Merci de renseigner ces quelques informations afin que nous puissions vous joindre en cas de pépin.</p>
		
		<label for="admin_name">Prénom</label>
		<input type="text" name="admin_name" value="" />
		<br/>
		
		<label for="admin_surname">Nom</label>
		<input type="text" name="admin_surname" value="" />
		<br/>

		<label for="admin_email">Email</label>
		<input type="email" name="admin_email" value="" />
		<br/>
				
		<label for="business">Votre structure</label>
		<input type="text" name="business" value="" title="Le nom de votre groupe, entreprise, association..." />
		<br/>
	
		<aside>
			<button class="prev">Retour</button>
			<button class="next">Suite</button>
		</aside>
	</fieldset>


	<fieldset id="election">
		<legend>Message aux électeurs</legend>
		
		<p>Ce message sera avec le mail d'invitation à voter, envoyé aux électeurs.</p>
		
		<label for="title">Titre</label>
		<input type="text" name="title" value="" />
		<br/>
				
		<label for="page">Message</label>
		<textarea name="page" class="richtext new"></textarea>
		<br/>
		<br/>
				
		<legend>Planification des élections</legend>

		<label for="start">Démarrage des votes</label>
		<input type="datetime" name="start" value="" />
		<br/>
				
		<label for="end">Clôture des votes</label>
		<input type="datetime" name="end" value="" />
		<br/>
	
		<aside>
			<button class="prev">Retour</button>
			<button class="next">Suite</button>
		</aside>
	</fieldset>
		
	
	<fieldset id="candidates">
		<legend>Les candidats</legend>
		
		<p>Entrez maintenant les différents candidats à élire. Vous pouvez aussi saisir des listes de candidats.</p>
	
		<div id="choices"></div>
		<br/>
	
		<legend>Nombre de gagnants</legend>
		
		<p>Combien de candidats seront déclarés gagnants parmis ceux qui auront remporté le plus de suffrages ?</p>
		
		<input type="number" name="winners" value="1" step="1" min="1" max="50" />
		<br/>

		<aside>
			<button class="prev">Retour</button>
			<button class="next">Suite</button>
		</aside>
	</fieldset>
	
	
	<fieldset id="electors">
		<legend>Les électeurs</legend>
		
		<p>Merci de télécharger la liste de vos électeurs. Afin de faciliter la manoeuvre,
		vous trouverez ci-dessous un fichier tableur à remplir. Ne modifiez pas le format
		de fichier, sous peine de ne pas pouvoir aller plus loin dans la procédure.</p>
		
		<p>Si le nombre d'électeurs n'est pas trop important, vous pouvez aussi les saisir
		directement dans le tableau ci-dessous.</p>
	
		<div id="elector-list-filler">
			<a href="<?php echo site_url() ?>assets/sample.csv">modèle de fichier</a>
			<img src="<?php echo site_url() ?>assets/img/arrow.png" alt="next step" />
			<input type="file" name="file" value="" />
			<img src="<?php echo site_url() ?>assets/img/arrow-turn.png" alt="next step" />
		</div>
				
		<div id="elector-list"></div>
	
		<aside>
			<button class="prev">Retour</button>
			<button class="next">Suite</button>
		</aside>		
	</fieldset>
	
	
	<fieldset id="thanks">
		<legend>Prêt ?</legend>
		
		<p>Votre élection est presque programmée ! Il ne vous reste plus qu'à valider le tout
		en cliquant sur le bouton ci-dessous. Ensuite, vous allez recevoir par email vos accès
		vous seront envoyés par email.</p>

		<aside>
			<button class="prev">Retour</button>
			<button class="save">Valider</button>
		</aside>		
	</fieldset>

</section>


<?php include( APPPATH . '/views/footer.php' ); ?>
