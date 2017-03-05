<?php
	//ce fichier contiendra les constantes systèmes
	
	if (!isset($page_root)) $page_root = "index.php";
	
	//-------------------------- CONSTANTE POUR LES ROUTES ----------------------------------------------------------------------------//
	//definit le chemin vers la racine du projet (depuis racine serveur web
	define('WEBROOT', str_replace("$page_root", '', $_SERVER['SCRIPT_NAME']));
	
	//definit la racine du dossier depuis le début du systeme
	define('ROOT', str_replace("$page_root", '', $_SERVER['SCRIPT_FILENAME']));
	
	//definit la racine du dossier depuis le début du systeme
	define('CTRROOT', str_replace("$page_root", '', $_SERVER['SCRIPT_FILENAME'])."app/controller/");
	
	//definit le chemin vers la racine du template -> app/views/template/
	define('TPLWEBROOT', str_replace("$page_root", '', $_SERVER['SCRIPT_NAME'])."app/views/template/");
	
	//definit le chemin vers la racine de l'admin -> admin/
	define('ADMWEBROOT', str_replace("$page_root", '', $_SERVER['SCRIPT_NAME'])."toad/");
	
	//definit le chemin vers la controller de l'admin -> admin/controller pour les include
	define('ADMCTRROOT', str_replace("$page_root", '', $_SERVER['SCRIPT_FILENAME'])."admin/controller/");
	
	//definit le chemin vers la racine des libs -> libs/
	define('LIBSWEBROOT', str_replace("$page_root", '', $_SERVER['SCRIPT_NAME'])."libs/");