<?php
	/** router */
	
	//chargement de constantes pour les chmin vers les dossiers
	require_once("config/initialise.php");
	
	//autoloader
	require_once("core/Autoloader.php");
	\core\Autoloader::register();
	
	//var bdd
	require_once("config/bdd.php");
	
	if ((isset($_GET['page'])) && ($_GET['page'] != "")) {
		$page = $_GET['page'];
		
		if (strpos($page, 'controller/') !== false) {
			require_once("app/".$page.".php");
		}
		else {
			if (!file_exists(ROOT."app/view/".$page.".php")) {
				header("HTTP/1.0 404 Not Found");
				header("location:".WEBROOT."carapace-rouge");
				die();
			}
			
			require_once("app/view/template/principal.php");
		}
	}
	else {
		$page = "index";
		require_once("app/view/template/principal.php");
	}