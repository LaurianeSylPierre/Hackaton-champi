<?php
	namespace core\auth;

	use core\App;
	use core\HTML\flashmessage\FlashMessage;

	class Connexion {

		public function __construct() {
			if (session_id() == null) {
				session_start();
			}
		}
		
		/**
		 * Fonction de connexions a un espace membre ou prive avec un login / mdp
		 * @param string $pseudo pseudo que l'utilisateur utilise pour se connecter
		 * @param string $mdp mot de passe que l'utilisateur utilise
		 * @param string $page_retour_err page de retour en cas d'err de mdp ou pseudo
		 * @param string $page_retour page de retour quand connexion ok
		 */
		public static function setLogin($pseudo, $mdp, $page_retour_err, $page_retour) {
			$dbc = App::getDb();
			$mdpbdd = "";

			//recup des donnees
			$pseudo = $dbc->quote(htmlspecialchars($pseudo));
			$mdp = md5(htmlspecialchars($mdp));
			$query = $dbc->select()->from("identite")->where("pseudo", "=", $pseudo, "", true)->get();

			//aficher query tant que qqch dans $ligne
			if ((is_array($query)) && (count($query) > 0)) {
				foreach ($query as $obj) {
					$id = $obj->ID_identite;
					$mdpbdd = $obj->mdp;
				}
			}

			//verif si num enr = 0
			if (!isset($id)) {
				FlashMessage::setFlash("Vos identifiants de connexions sont incorrects");
				header("location:$page_retour_err");
			}
			else {
				//si les mdp sont egaux on redirige ver esace membre sinon ver login avec un mess d'erreur
				if ($mdp == $mdpbdd) {
					$_SESSION["idlogin"] = $id;

					FlashMessage::setFlash("Vous êtes maintenant connecté", "info");
					header("location:$page_retour");
				}
				else {
					FlashMessage::setFlash("Vos identifiants de connexions sont incorrects");
					header("location:$page_retour_err");
				}
			}
		}

		public static function setObgConnecte($page_retour) {
			if (!isset($_SESSION["idlogin"])) {
				FlashMessage::setFlash("Vous devez être connecté pour accéder à cette page");
				header("location:".$page_retour);
			}
		}

		/**
		 * Fonction pour déconnecter un membre (on degage session et cookie)
		 * @param string $page_retour page sur laquel rediriger le mec qui a clique sur déconnexion
		 */
		public static function setDeconnexion($page_retour) {
			$_SESSION['login'];
			$_SESSION["idlogin"];
			unset($_SESSION['login']);
			unset($_SESSION["idlogin"]);
			session_destroy();
			setcookie("auth", NULL, -1);

			session_start();
			FlashMessage::setFlash("Vous avez été déconnecté avec succès", "success");

			header("location:".$page_retour);
		}
	}