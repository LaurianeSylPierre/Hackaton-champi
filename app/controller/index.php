<?php
	$champi = new \app\controller\Champignon();
	$champi->getAllChampignon();
	
	$arr["champignon"] = [
		"nom" => $champi->getNom(),
		"toxique" => $champi->getToxique(),
		"accessibilite" => $champi->getAccessibilite(),
		"posx" => $champi->getPosx(),
		"posy" => $champi->getPosy()
	];
	
	$json = json_encode($arr);
	
	echo($json);
	
	echo("<pre>");
	print_r($arr);
	echo("</pre>");