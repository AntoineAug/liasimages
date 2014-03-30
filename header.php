<?php require "kernel/fonctions.php"; ?>
<!DOCTYPE html>
<html lang="fr"> 
<head>
	<title><?php displayPageTitle(); ?></title>	
	<meta charset="utf-8" />
	<meta name="description" content="Photographe Book - Test agence - Portrait -  Edito - Mariage et Infograhiste 3D sur Montpellier."/>
	<meta name="keywords" content="Photographe, Photo, Photographie, Modele, Modelling, Montpellier, Boo, Agence, Portrait, Portraitriste, Mariage, Infographie, Image, Shoot, Shooting, Shot, Shoting, Videos, Model"/> 
	<meta name="author" content="Antoine Augusti"/> 
	<meta name="revisit-after" content="2 days"/> 
	<meta name="Robots" content="all"/>

	<link href='http://fonts.googleapis.com/css?family=Roboto:100|Roboto+Condensed' rel='stylesheet' type='text/css'><link rel="stylesheet" href="/css/style.css" />

	<link rel="icon" type="image/png" href="/images/favicon.png"> 
	<link rel="shortcut icon" type="image/x-icon" href="/images/favicon.png">
	<meta property="og:image" content="http://www.liasimages.com/images/accueil.jpg"/>

	<script src="http://code.jquery.com/jquery-1.7.min.js"></script>
	<script src="/js/mousewheel.js"></script>

	<script>
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-12045924-31']);
	_gaq.push(['_setDomainName', 'liasimages.com']);
	_gaq.push(['_trackPageview']);

	(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
	</script>
</head>
<body>
<!--
//	Développement par Antoine AUGUSTI
//	antoine@augusti.fr - www.antoine-augusti.fr
//	Et... 42.
//	Bisous !
!-->
<!-- Ce lien est carrément stylé. -->
<script src="/js/js.js"></script>
<div id="wrap">
	<div id="main">
		<div id="sidebar">
			<ul id="menu">
				<?php
					displayMenu();
				?>
				<li>
					<a href="/contact" onClick="_gaq.push(['_trackEvent', 'Gallerie', 'clic', 'Contact']);">Contact</a>
				</li>
			</ul>
		</div><!-- END SIDEBAR -->

		<div id="content">