<?php
	$pseudo = $_POST['pseudo'];
	$mdp = $_POST['mdp'];

	if (isset($_POST['admin'])) {
		\core\auth\Connexion::setLogin($pseudo, $mdp, WEBROOT."toad/login", WEBROOT."toad", 0);
	}
	else {
		\core\auth\Connexion::setLogin($pseudo, $mdp, WEBROOT."login", WEBROOT."index.php", 0);
	}