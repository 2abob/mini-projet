<div id="body">
	<div class="content">
		<div class="section">
			<div class="breadcrumb">
			</div>
			<div class="gallery">
				<h2>Resultat de recherche</h2>				
				<?php if($maison == NULL) { ?>
					<center><h3>aucun r&eacute;sultat</h3></center>
				<?php } ?>
				<ul>
					<?php foreach($maison as $tmp) { ?>
					<li>
						<a href="gallery-single.html" class="figure"><img src="<?php echo base_url("assets/images/".$tmp["IMAGE"]) ?>" alt="<?php echo $tmp["TITLE"]?>" title="<?php echo $tmp["TITLE"]?>" ></a>
						<h4><a href="gallery-single.html"><?php echo $tmp["TITLE"] ?></a></h4>
						<p>
							type : <?php echo $tmp["TYPE"] ?>
						</p>
						<p>
							Location : <?php echo $tmp["LOCATION"] ?>
						</p>
					</li>
					<?php } ?>
				</ul>
			</div>
			<?php if($maison != null) { ?>
				<div class="paging">
					<span>page <?php echo $CUR." sur ".$NB ?></span>
					<ul>
						<?php for($i = 0, $j = 1;$i < $NB;$i++, $j++){ ?>
						<li <?php if($CUR == $j) echo "class=\"selected\""?>>
							<a href="<?php echo "recherche-".($j)."-".$key.".html" ?>"><?php echo $j?></a>
						</li>
						<?php } ?>
					</ul>
				</div>
			<?php } ?>
		</div>
	</div>
</div>