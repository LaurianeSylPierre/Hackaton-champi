<?php
	/** router */
	
	//chargement de constantes pour les chmin vers les dossiers
	require_once("config/initialise.php");
	
	if ((isset($_GET['page'])) && ($_GET['page'] != "")) {
		$page = $_GET['page'];
		
		if (strpos($page, 'controller/') !== false) {
			require_once("app/".$page.".php");
		}
		else {
			require_once("app/view/template/principal.php");
		}
	}
	else {
		$page = "index";
		require_once("app/view/template/principal.php");
	}