<div id="body">
	<div class="content">
		<div class="section">
			<div class="booking">
				<h2>Voulez-vous modifier <?php echo $maison[0]["TITLE"]." ?"  ?></h2>
				<form action="maintenance-modifier3-<?php echo $maison[0]["IDMAISON"] ?>.html" method="post" enctype="multipart/form-data" >
					<h4>fill in your contact details</h4>
					<div class="form1">
						<label for="fname"> <span>surface</span>
							<input type="text" name="surface" id="fname" value="<?php echo $maison[0]["SURFACE"]?>">
						</label>
						<label for="lname"> <span>nombre de salle</span>
							<input type="text" name="nbsalle" id="lname" value="<?php echo $maison[0]["NOMBRESALLE"]?>">
						</label>
						<label for="email3"> <span>nombre de douche</span>
							<input type="text" name="nbdouche" id="email3" value="<?php echo $maison[0]["NOMBREDOUCHE"]?>">
						</label>
						<label for="phone"> <span>nombre de wc</span>
							<input type="text" name="nbwc" id="phone" value="<?php echo $maison[0]["NOMBREWC"]?>">
						</label>
						<label for="address1"> <span>climatisation</span>
							<input type="text" name="climat" id="address1" value="<?php echo $maison[0]["CLIMATISATION"]?>">
						</label>
						<div>
							<label for="city"> <span>Type</span>
								<select name="type" id="city" disabled="true">
										<option value="<?php echo $maison[0]["IDTYPE"] ?>"><?php echo $maison[0]["TYPE"] ?></option>
								</select>
							</label>
							<label for="state"> <span>Location</span>
								<select name="location" id="state" disabled="true">
										<option value="<?php echo $maison[0]["IDLOCATION"] ?>"><?php echo $maison[0]["LOCATION"] ?></option>
								</select>
							</label>
						</div>
						<label for="address2"> <span>air conditionne</span>
							<input type="text" name="aircond" id="address2" value="<?php echo $maison[0]["AIRCONDITIONNE"]?>">
						</label>
						<label for="schedule"> <span>titre image</span>
							<input type="text" name="title" id="schedule" value="<?php echo $maison[0]["TITLE"]?>">
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