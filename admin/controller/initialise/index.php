<?php
	$admin_champi = new \admin\controller\AdminChampignon();
	$admin_champi->getBadMoyenneChampignon();
	
	$arr["champignon"] = [
		"nom" => $admin_champi->getNom(),
		"toxique" => $admin_champi->getToxique(),
		"accessibilite" => $admin_champi->getAccessibilite(),
		"posx" => $admin_champi->getPosx(),
		"posy" => $admin_champi->getPosy(),
		"moyenne" => $admin_champi->getMoyenne()
	];
	
	json_encode($arr);
	
	echo(json_encode($arr));
	
	echo("<pre>");
	print_r($arr);
	echo("</pre>");