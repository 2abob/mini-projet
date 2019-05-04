<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="Description" content="Site vous permettant de retrouver les appartements et les maisons les moins cher du plus classic au plus luxe" />
	<meta name="keywords" content="maison, appartement, ville, campagne, climatisation, air conditionne" />
	<title>Le Sp&eacute;cialiste En Immobilier - M Immobilier</title>
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
				<li <?php if(current_url() == base_url("index.php")) echo "class=\"selected\"" ?> >
					<a href="<?php echo base_url() ?>">accueil</a>
				</li>
				<li>
					<a href="<?php echo base_url("catalogue-type-1.html") ?>">type de maison</a>
					<ul>
						<?php foreach($type as $data){ ?>
							<li>
								<a href="<?php echo base_url("catalogue-".$data["IDTYPE"])."-1.html" ?>"><?php echo $data["TYPE"]?></a>
							</li>
						<?php } ?>
					</ul>
				</li>
			</ul>
		</div>
	</div>