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
		<!-- ce fichier incluera les pages des vues -->
		<!-- header goes here -->
		<header>
			<div class="container">
				<div class="row">
					<div class="col-xs-6">
						<img class="img-responsive" src="<?=TPLWEBROOT?>img/cs_logo1.svg"/>
					</div>
					
					<div class="col-xs-2 col-xs-offset-4">
						<button type="button">+</button>
					</div>
				</div>
			</div>
		</header>
		
		<?php require_once(ROOT."app/view/".$page.".php") ?>
		
		<!-- footer goes here -->
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<img src="<?=TPLWEBROOT?>img/cs_logo1.svg"/>
					</div>
					
					<div id="more_spot" class="col-sm-2 col-sm-offset-4">
						<button type="button">+</button>
					</div>
				</div>
			</div>
		</footer>
	</body>
</html>