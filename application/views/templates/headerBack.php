<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="Description" content="Site vous permettant de retrouver les appartements et les maisons les moins cher du plus classic au plus luxe" />
	<meta name="keywords" content="maison, appartement, ville, campagne, climatisation, air conditionne" />
	<title>Maintenance - M Immobilier</title>
	<link rel="shortcut icon" type="image/icon" href="<?php echo base_url("assets/images/favicon.png") ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/style.css") ?>" type="text/css" />
</head>
<body>
	<div id="header">
		<div>
			<a href="<?php echo base_url() ?>" class="logo"><img src="<?php echo base_url("assets/images/logo.png")?>" alt=""></a>
			<form action="<?php echo base_url("recherche-1.html") ?>" method="post" >
				<input type="text" name="key" id="search" value="">
				<input type="submit" name="searchBtn" id="searchBtn" value="">
			</form>
		</div>
		<div class="navigation">
			<ul>
				<li>
					<a href="<?php echo base_url("maintenance-ajouter.html") ?>">ajouter</a>
				</li>
				<li>
					<a href="<?php echo base_url("maintenance-supprimer-1.html") ?>">supprimer</a>
				</li>
				<li>
					<a href="<?php echo base_url("maintenance-modifier-1.html") ?>">modifier</a>
				</li>
				<?php if($this->session->userdata('LOGIN') !== NULL) { ?>
				<li>
					<a href="<?php echo base_url("deconnection.html") ?>">se deconnecter</a>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>