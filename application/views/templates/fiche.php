<div id="body">
	<div class="content">
		<div class="section">
			<div class="breadcrumb">
			</div>
			<div class="gallery">
				<h2><?php echo $maison[0]["TITLE"] ?></h2>
				<a href="#" class="figure"><img src="<?php echo base_url("assets/images/".$maison[0]["IMAGE"]) ?>" alt="<?php echo $maison[0]["TITLE"] ?>" title="<?php echo $maison[0]["TITLE"] ?>" ></a>
				<div>
					<p>
						location : <?php echo $maison[0]["LOCATION"] ?>
					</p>
					<p>
						type : <?php echo $maison[0]["TYPE"] ?>
					</p>
					<p>
						nombre de salle : <?php echo $maison[0]["NOMBRESALLE"] ?>
					</p>
					<p>
						nombre de douche : <?php echo $maison[0]["NOMBREDOUCHE"] ?>
					</p>
					<p>
						nombre de wc : <?php echo $maison[0]["NOMBREWC"] ?>
					</p>
					<p>
						air conditionne : <?php if($maison[0]["AIRCONDITIONNE"] > 0) echo "oui";else echo "non"; ?>
					</p>
					<p>
						climatisation : <?php if($maison[0]["CLIMATISATION"] > 0) echo "oui";else echo "non"; ?>
					</p>
				</div>
			</div>
			<div class="booking">
				<form action="catalogue-<?php echo $type2."-".$offset ?>.html" method="post">
					<input type="submit" name="send2" id="send2" value="retour" style="font-size:25px;color:#ffffff;">
				</form>
			</div>
		</div>
		
	</div>
</div>