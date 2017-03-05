<?php
	/** router */
	
	//chargement de constantes pour les chmin vers les dossiers
	$page_root = "admin.php";
	session_start();
	
	require_once("config/initialise.php");
	require_once("config/bdd.php");
	
	//autoloader
	require_once("core/Autoloader.php");
	\core\Autoloader::register();
	
	if ((isset($_GET['page'])) && ($_GET['page'] != "")) {
		$page = $_GET['page'];
		
		if (!isset($_SESSION['idlogin']) && ($page != "login")) {
			\core\auth\Connexion::setObgConnecte(WEBROOT."toad/login");
		}
		
		if (strpos($page, 'controller/') !== false) {
			require_once("admin/".$page.".php");
		}
		else {
			require_once("router/admin_routes.php");
			
			if ($page == "login") {
				require_once("admin/view/template/login.php");
			}
			else {
				require_once("admin/view/template/principal.php");
			}
		}
	}
	else {
		$page = "index";
		require_once("admin/view/template/principal.php");
	}