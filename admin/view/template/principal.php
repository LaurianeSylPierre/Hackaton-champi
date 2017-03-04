<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ChmapiSpot admin</title>
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=TPLWEBROOT?>css/style.css">
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<!-- ce fichier incluera les pages des vues -->
		<!-- header goes here -->
		
		<?php require_once(ROOT."admin/view/".$page.".php") ?>
		
		<!-- footer goes here -->
	</body>
</html>