<div class="container">
	<div class="row">
		<div class="col-sm-12 text-center">
			<h1>Modération des champignons</h1>
			<p>Ci dessous la liste des champignons avec une très faible moyenne, vérifiez leurs véracité</p>
		</div>
		
		<div class="col-sm-12">
			<?php if (count($arr["champignon"]["nom"]) > 0): ?>
				<?php for($i=0 ; $i<count($arr["champignon"]["nom"]) ; $i++):?>
					<p><?=$arr["champignon"]["nom"][$i]?> <?=$arr["champignon"]["moyenne"][$i]?></p>
					<a href="<?=ADMWEBROOT?>controller/champignon/supprimer-spot?id_champignon=<?=$arr["champignon"]["id_champignon"][$i]?>&id_localisation=<?=$arr["champignon"]["id_localisation"][$i]?>">Supprimer ce spot</a>
				<?php endfor;?>
			<?php else: ?>
				<p>Pas de champignon avec une faible moyenne</p>
			<?php endif;?>
		</div>
	</div>
</div>