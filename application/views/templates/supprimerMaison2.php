<div id="body">
	<div class="content">
		<div class="section">
			<div class="booking">
				<h2>Voulez-vous vraiment supprimer <?php echo $maison[0]["TITLE"]." ?" ?></h2>
				<form action="maintenance-supprimer2-<?php echo $maison[0]["IDMAISON"]?>.html" method="post" >
					<h4>Type : <?php echo $maison[0]["TYPE"] ?></h4>
					<h4>Location : <?php echo $maison[0]["LOCATION"] ?></h4>
					<h4>Surface : <?php echo $maison[0]["SURFACE"]." m<sup>2</sup>" ?></h4>
					<h4>Nombre de salle : <?php echo $maison[0]["NOMBRESALLE"]." salles" ?></h4>
					<h4>Nombre de douche : <?php echo $maison[0]["NOMBREDOUCHE"] ?></h4>
					<h4>Nombre de wc : <?php echo $maison[0]["NOMBREWC"] ?></h4>
					<h4>Climatisation : <?php if($maison[0]["CLIMATISATION"] == 1)echo "oui";else echo "non"; ?></h4>
					<h4>Air conditionne : <?php if($maison[0]["AIRCONDITIONNE"] == 1)echo "oui";else echo "non"; ?></h4>
					<input type="submit" name="send2" id="send2" value="supprimer" style="font-size:25px;color:#ffffff;">
				</form>
				<form action="maintenance-supprimer-1.html" method="post">
					<input type="submit" name="send2" id="send3" value="annuler" style="font-size:25px;color:#ffffff;">
				</form>
			</div>
		</div>
	</div>
</div>