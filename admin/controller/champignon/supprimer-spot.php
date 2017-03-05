<?php
	$admin_champi = new \admin\controller\AdminChampignon();
	
	$admin_champi->setSupprimerChampignon($_GET['id_champignon'], $_GET['id_localisation']);
	
	\core\HTML\flashmessage\FlashMessage::setFlash("Le champignong a bien été supprimé", "success");
	header("location:".ADMWEBROOT);