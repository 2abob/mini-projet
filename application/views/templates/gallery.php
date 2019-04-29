<div id="body">
	<div class="content">
		<div class="section">
			<div class="breadcrumb">
			</div>
			<div class="gallery">
				<h2>Maison, appartement</h2>
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
			<div class="paging">
				<span>page <?php echo $CUR." sur ".$NB ?></span>
				<ul>
					<?php for($i = 0, $j = 1;$i < $NB;$i++, $j++){ ?>
					<li <?php if($CUR == $j) echo "class=\"selected\""?>>
						<a href="<?php echo "catalogue-".$type2."-".($j).".html"?>"><?php echo $j ?></a>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</div>