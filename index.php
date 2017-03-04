<?php
	/** router */
	
	if ((isset($_GET['page'])) && ($_GET['page'] != "")) {
		$page = $_GET['page'];
	}
	else {
		$page = "index.php";
	}
	
	require_once("app/view/template/principal.php");