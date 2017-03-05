<?php
	$champi = new \app\controller\Champignon();
	if (isset($_GET['nom'])) {
		$champi->getAllChampignon($_GET['nom']);
	}
	else {
		$champi->getAllChampignon();
	}
	
	$arr["champignon"] = [
		"nom" => $champi->getNom(),
		"toxique" => $champi->getToxique(),
		"accessibilite" => $champi->getAccessibilite(),
		"posx" => $champi->getPosx(),
		"posy" => $champi->getPosy()
	];
	
	$json = json_encode($arr);
	
	$liste_champignon = $champi->getListeTypeChampignon();
	
	echo($json);
	
	echo("<pre>");
	print_r($arr);
	echo("</pre>");