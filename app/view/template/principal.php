<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ChampiSpot</title>
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=TPLWEBROOT?>css/style.css">
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
		<script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
	</head>
	<body>
		<header>
			<div id="header">
				<div class="container">
					
					<div  class="row">
						<div class="col-xs-6 col-xs-offset-1">
							<img src="<?=TPLWEBROOT?>img/cs_logo1.svg"/>
						</div>
						
						<div id="more_spot" class="col-xs-2 col-xs-offset-3">
							<a href="<?=WEBROOT?>ajouter-champignon">
								<img class="icone" id="cross" src="<?=TPLWEBROOT?>img/button_whitecross.svg"/>
							</a>
						</div>
					</div>
				</div>
			</div>
		</header>
		
		<?php require_once(ROOT."app/view/".$page.".php") ?>
		
		<!-- footer goes here -->
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-xs-9 col-xs-offset-1">
						<button type="submit">
							<img src="<?=TPLWEBROOT?>img/button_loupe.svg"/>
						</button>
						<form class="searchbar" method="get" action="<?=WEBROOT?>index">
							<select name="nom" id="nom">
								<option selected> Choisissez votre type de champignons</option>
								<option value="morilles">Morilles</option>
								<option value="amanites">Amanites </option>
								<option value="cepes">Cèpes</option>
							</select>
						</form>
					</div>
					<div id="more_spot" class="col-xs-2">
						<img class="icone" src="<?=TPLWEBROOT?>img/button_info.svg"/>
					</div>
				</div>
			</div>
		</footer>
	</body>
</html>