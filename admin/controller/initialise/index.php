<?php
	$admin_champi = new \admin\controller\AdminChampignon();
	$admin_champi->getBadMoyenneChampignon();
	
	$arr["champignon"] = [
		"id_champignon" => $admin_champi->getIdChampignon(),
		"id_localisation" => $admin_champi->getIdLocalisation(),
		"nom" => $admin_champi->getNom(),
		"toxique" => $admin_champi->getToxique(),
		"accessibilite" => $admin_champi->getAccessibilite(),
		"posx" => $admin_champi->getPosx(),
		"posy" => $admin_champi->getPosy(),
		"moyenne" => $admin_champi->getMoyenne()
	];
	
	$json = json_encode($arr);