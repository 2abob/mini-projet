<div id="body">
	<div class="content">
		<div class="section">
			<div class="booking">
				<h2><?php if($resultat["succes"]) echo "Insertion effectuer avec succ&egrave;s"; else echo "Insertion &eacute;chou&eacute; : ".$resultat["erreur"] ?></h2>
				<form action="maintenance-ajouter.html" method="post">
					<input type="hidden" name="idtype" value="<?php echo $resultat["valeur"]["idtype"] ?>">
					<input type="hidden" name="idlocation" value="<?php echo $resultat["valeur"]["idlocation"] ?>">
					<input type="hidden" name="surface" value="<?php echo $resultat["valeur"]["surface"] ?>">
					<input type="hidden" name="nbsalle" value="<?php echo $resultat["valeur"]["nbsalle"] ?>">
					<input type="hidden" name="nbdouche" value="<?php echo $resultat["valeur"]["nbdouche"] ?>">
					<input type="hidden" name="nbwc" value="<?php echo $resultat["valeur"]["nbwc"] ?>">
					<input type="hidden" name="clim" value="<?php echo $resultat["valeur"]["clim"] ?>">
					<input type="hidden" name="aircond" value="<?php echo $resultat["valeur"]["aircond"] ?>">
					<input type="hidden" name="title" value="<?php echo $resultat["valeur"]["title"] ?>">
					<input type="submit" name="send2" id="send2" value="retour" style="font-size:25px;color:#ffffff;">
				</form>
			</div>
		</div>
	</div>
</div>