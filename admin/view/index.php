<div class="container">
	<div class="row">
		<div class="col-sm-12 text-center">
			<h1>Modération des champignons</h1>
			<p>Ci dessous la liste des champignons avec une très faible moyenne, vérifiez leurs véracité</p>
		</div>
		
		<div class="col-sm-12">
			<?php for($i=0 ; $i<count($arr["champignon"]["nom"]) ; $i++):?>
				<p><?=$arr["champignon"]["nom"][$i]?> <?=$arr["champignon"]["moyenne"][$i]?></p>
			<?php endfor;?>
		</div>
	</div>
</div>