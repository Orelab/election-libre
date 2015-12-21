<?php defined("BASEPATH") OR exit("No direct script access allowed");


//-- Index

$lang["cms_index"] = "
		<h1>Election libre</h1>
		
		<h2><b>Organisez</b> vos élections par internet en toute sécurité, en toute transparence.</h2>
		<h3><b>Décidez</b> démocratiquement, un électeur = une voie.</h3>
		<h3><b>Votez</b> à bulletin secret, anonymement.</h3>
";



//-- New election (public form)

$lang["cms_manage_index"] = "
		<legend>Simplifiez-vous le vote</legend>
		
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
";

$lang["cms_manage_start"] = "Démarrer";

$lang["cms_manage_info"] = "Merci de renseigner ces quelques informations afin que nous puissions vous joindre en cas de pépin.";

$lang["cms_manage_contact"] = "Vos coordonnées";

$lang["cms_manage_name"] = "Prénom";

$lang["cms_manage_surname"] = "Nom";

$lang["cms_manage_email"] = "Email";

$lang["cms_manage_business"] = "Votre entreprise";

$lang["cms_manage_business_detail"] = "Le nom de votre groupe, entreprise, association...";

$lang["cms_manage_prev"] = "Retour";

$lang["cms_manage_next"] = "Suite";

$lang["cms_manage_election"] = "
		<legend>Message aux électeurs</legend>
		
		<p>Ce message sera avec le mail d'invitation à voter, envoyé aux électeurs.</p>
";

$lang["cms_manage_title"] = "Titre";

$lang["cms_manage_msg"] = "Message";

$lang["cms_manage_planification"] = "Planification des élections";

$lang["cms_manage_begining"] = "Démarrage des votes";

$lang["cms_manage_ending"] = "Clôture des votes";

$lang["cms_manage_candidates"] = "
		<legend>Les candidats</legend>
		
		<p>Entrez maintenant les différents candidats à élire. Vous pouvez aussi saisir des listes de candidats.</p>
";

$lang["cms_manage_winners"] = "
		<legend>Nombre de gagnants</legend>
		
		<p>Combien de candidats seront déclarés gagnants parmis ceux qui auront remporté le plus de suffrages ?</p>
";

$lang["cms_manage_electors"] = "
		<legend>Les électeurs</legend>
		
		<p>Merci de télécharger la liste de vos électeurs. Afin de faciliter la manoeuvre,
		vous trouverez ci-dessous un fichier tableur à remplir. Ne modifiez pas le format
		de fichier, sous peine de ne pas pouvoir aller plus loin dans la procédure.</p>
		
		<p>Si le nombre d'électeurs n'est pas trop important, vous pouvez aussi les saisir
		directement dans le tableau ci-dessous.</p>
";

$lang["cms_manage_template"] = "modèle de fichier";

$lang["cms_manage_thanks"] = "
		<legend>Prêt ?</legend>
		
		<p>Votre élection est presque programmée ! Il ne vous reste plus qu'à valider le tout
		en cliquant sur le bouton ci-dessous. Ensuite, vous allez recevoir par email vos accès
		vous seront envoyés par email.</p>
";

$lang["cms_manage_save"] = "Valider";



//-- Credits

$lang["cms_credits_title"] = "Crédits&nbsp;:";

$lang["cms_credits_framework"] = "Framework&nbsp;:";

$lang["cms_credits_developer"] = "Développement&nbsp;:";

$lang["cms_credits_translation"] = "Traductions&nbsp;:";

$lang["cms_credits_design"] = "Design graphique&nbsp;:";



//-- Disclaimer

$lang["cms_credits_disclaimer"] = "
	<h2>Avertissement</h2>
	
	<p>Le vote électronique est un sujet délicat : il est parfois sujet à
	méfiance, de par son côté obscur et complexe. Cette méfiance est légitime :
	dans l'absolu, tout système informatique est piratable.</p>
	
	<h3>Ce que nous cherchons à améliorer :</h3>
	
	<ul>
		<li><b>La transparence :</b> en publiant le code source du programme, en cherchant à le rendre simple,
		et en fournissant une version en ligne utilisable</li>
		<li><b>La confidentialité :</b> le programme enregistre, d'une part, le fait qu'un électeur à voté 
		(cela est nécessaire pour s'assurer qu'un seul vote est effectué par électeur), et enregistre 
		d'autre part le vote, sans toutefois enregistrer qui a voté pour quoi.</li>
		<li><b>L'accessibilité :</b> en utilisant le réseau des réseaux, et en fournissant une interface
		simple, adaptée au périphériques mobiles, et répondants aux normes d'accessibilité, nous nous assurons
		qu'un maximum d'électeurs peuvent utiliser le système.</li>
		<li><b>La vérifiabilité :</b> chaque électeur peut - à l'aide de sa clé personnelle - vérifier son
		bulletin de vote, à tout moment, pendant et après le dépouillement des résultats.</li>
	</ul>
	
	<h3>Ce que nous ne garantissons pas :</h3>
	
	<ul>
		<li><b>L'identité de l'électeur :</b> chaque électeur est identifié par son adresse email.
		Si cette adresse est espionnée ou piratée, la légitimité du vote est compromise.</li>
		<li><b>La coercition :</b> si le vote de l'électeur est réalisé sans une juste intention,
		sous la contrainte, ou avec des intérêts mercantiles, le système informatique ne peut garantir la 
		validité des suffrages. Une fraude de type 
		\"<a href=\"http://binaire.blog.lemonde.fr/2015/08/24/attaque-a-litalienne-2/\">attaque à l'italienne</a>\"
		est notamment possible avec ce système.</li>
	</ul>
	
	<h3>Le vote électronique, pour quel usages ?</h3>
	
	<p>Nous avons conçu ce programme pour répondre au besoin d'organiser simplement - et de manière démocratique - 
	une élection ou un référundum dans le cadre d'un groupe restreint et dont les motivations n'est pas excessif,
	comme dans le cadre d'une association caritative qui ne brasse pas assez de finances pour atiser les convoitises.</p>
";





