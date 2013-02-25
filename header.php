<?php
require "kernel/fonctions.php";
?>
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
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="/css/style.css" />
	<link rel="icon" type="image/png" href="/images/favicon.png"> 
	<link rel="shortcut icon" type="image/x-icon" href="/images/favicon.png">
	<script src="http://code.jquery.com/jquery-1.7.min.js"></script>
	<script src="/js/mousewheel.js"></script>
</head>
<body>
<!--
//	Développement par Antoine AUGUSTI
//	antoine@augusti.fr - www.antoine-augusti.fr
//	Et... 42.
//	Bisous !
!-->
<script src="/js/js.js"></script>
	<div id="header">
		<div id="logo"><a href="/" title="Retour à l'accueil"/></a></div>
		<ul id="menu">
			<?php
				displayMenu();
			?>
			<li>
				<a href="/contact">Contact</a>
			</li>
		</ul>
	</div><!-- END HEADER -->