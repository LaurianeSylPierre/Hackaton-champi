<?php
	/** router */
	
	//chargement de constantes pour les chmin vers les dossiers
	$page_root = "admin.php";
	require_once("config/initialise.php");
	
	//autoloader
	require_once("core/Autoloader.php");
	\core\Autoloader::register();
	
	if (!isset($_SESSION['idlogin'])) {
		require_once("admin/view/template/login.php");
	}
	
	if ((isset($_GET['page'])) && ($_GET['page'] != "")) {
		$page = $_GET['page'];
		
		if (strpos($page, 'controller/') !== false) {
			require_once("admin/".$page.".php");
		}
		else {
			require_once("admin/view/template/principal.php");
		}
	}
	else {
		$page = "index";
		require_once("admin/view/template/principal.php");
	}