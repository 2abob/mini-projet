<div id="body">
	<div class="content">
		<div class="section">
			<div class="breadcrumb">
			</div>
			<div class="gallery">
				<h2>Modifier une Maison ou un appartement</h2>
				<ul>
					<?php foreach($maison as $tmp) { ?>
					<li>
						<img class="figure" src="<?php echo base_url("assets/images/".$tmp["IMAGE"]) ?>" alt="<?php echo $tmp["TITLE"]?>" title="<?php echo $tmp["TITLE"]?>" >
						<h4><?php echo $tmp["TITLE"] ?></h4>
						<p>
							type : <?php echo $tmp["TYPE"] ?>
						</p>
						<p>
							Location : <?php echo $tmp["LOCATION"] ?>
						</p>
						<p>
							<a href="<?php echo base_url("maintenance-modifier2-".$tmp["IDMAISON"].".html") ?>" class="form1" id="send2" >modifier les information</a>
						</p>
						<p>
							<a href="<?php echo base_url("maintenance-modifierimage-".$tmp["IDMAISON"].".html") ?>" class="form1" id="send2" >modifier l'image</a>
						</p>
					</li>
					<?php } ?>
				</ul>
			</div>
			<div class="paging">
				<span>page <?php echo $CUR." sur ".$NB ?></span>
				<ul>
					<?php for($i = 0, $j = 1;$i < $NB;$i++, $j++){ ?>
					<li <?php if($CUR == $j) echo "class=\"selected\""?>>
						<a href="<?php echo "maintenance-modifier-".$j.".html"?>"><?php echo $j ?></a>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</div>