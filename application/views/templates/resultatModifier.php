<div id="body">
	<div class="content">
		<div class="section">
			<div class="booking">
				<h2><?php if($resultat["succes"]) echo "Modification effectuer avec succ&egrave;s"; else echo "Modification &eacute;chou&eacute; : ".$resultat["erreur"] ?></h2>
				<form action="maintenance-modifierimage-<?php echo $id?>.html" method="post">
					<input type="submit" name="send2" id="send2" value="retour" style="font-size:25px;color:#ffffff;">
				</form>
			</div>
		</div>
	</div>
</div>