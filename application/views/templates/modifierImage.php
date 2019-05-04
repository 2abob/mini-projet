<div id="body">
	<div class="content">
		<div class="section">
			<div class="booking">
				<h2>Modifier l'image <?php echo $maison[0]["TITLE"] ?></h2>
				<form action="maintenance-modifierimage2-<?php echo $id ?>.html" method="post" enctype="multipart/form-data" >
					<h4>fill in your contact details</h4>
					<div class="form1">
						<label for="zip"> <span>image</span>
							<input type="file" name="image" id="zip">
						</label>
					</div>
					<input type="submit" name="send2" id="send2" value="modifier" style="font-size:25px;color:#ffffff;">
				</form>
				<form action="maintenance-modifier-1.html" method="post">
					<input type="submit" name="send2" id="send3" value="annuler" style="font-size:25px;color:#ffffff;">
				</form>
			</div>
		</div>
	</div>
</div>