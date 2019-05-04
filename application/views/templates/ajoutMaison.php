<div id="body">
	<div class="content">
		<div class="section">
			<div class="booking">
				<h2>ajouter une maison ou un appartement</h2>
				<form action="maintenance-inserer.html" method="post" enctype="multipart/form-data" >
					<h4>fill in your contact details</h4>
					<div class="form1">
						<label for="fname"> <span>surface</span>
							<input type="text" name="surface" id="fname" value="<?php echo $maison["surface"]?>" >
						</label>
						<label for="lname"> <span>nombre de salle</span>
							<input type="text" name="nbsalle" id="lname" value="<?php echo $maison["nbsalle"]?>">
						</label>
						<label for="email3"> <span>nombre de douche</span>
							<input type="text" name="nbdouche" id="email3" value="<?php echo $maison["nbdouche"]?>">
						</label>
						<label for="phone"> <span>nombre de wc</span>
							<input type="text" name="nbwc" id="phone" value="<?php echo $maison["nbwc"]?>">
						</label>
						<label for="address1"> <span>climatisation</span>
							<input type="text" name="climat" id="address1" value="<?php echo $maison["clim"]?>">
						</label>
						<div>
							<label for="city"> <span>Type</span>
								<select name="type" id="city">
									<?php foreach($type as $tmp) { ?>
										<option value="<?php echo $tmp["IDTYPE"] ?>"><?php echo $tmp["TYPE"] ?></option>
									<?php } ?>
								</select>
							</label>
							<label for="state"> <span>Location</span>
								<select name="location" id="state">
									<?php foreach($location as $tmp) { ?>
										<option value="<?php echo $tmp["IDLOCATION"] ?>"><?php echo $tmp["LOCATION"] ?></option>
									<?php } ?>
								</select>
							</label>
						</div>
						<label for="address2"> <span>air conditionne</span>
							<input type="text" name="aircond" id="address2" value="<?php echo $maison["aircond"]?>">
						</label>
						<label for="zip"> <span>image</span>
							<input type="file" name="image" id="zip" >
						</label>
						<label for="schedule"> <span>titre image</span>
							<input type="text" name="title" id="schedule" value="<?php echo $maison["title"]?>">
						</label>
					</div>
					<input type="submit" name="send2" id="send2" value="inserer" style="font-size:25px;color:#ffffff;">
				</form>
			</div>
		</div>
	</div>
</div>