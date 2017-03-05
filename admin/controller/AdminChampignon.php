<?php
	namespace admin\controller;
	
	
	use app\controller\Champignon;
	use core\App;
	
	class AdminChampignon extends Champignon {
		
		
		//-------------------------- BUILDER ----------------------------------------------------------------------------//
		public function __construct() {
			
		}
		//-------------------------- END BUILDER ----------------------------------------------------------------------------//
		
		
		//-------------------------- GETTER ----------------------------------------------------------------------------//
		/**
		 * fonction pour récupérer les champignons avec une mauvaise moyenne
		 */
		public function getBadMoyenneChampignon() {
			$dbc = App::getDb();
			$query = $dbc->select()
				->from("champignon")
				->from("localisation")
				->where("moyenne", "<", "20", "AND")
				->where("champignon.ID_localisation", "=", "localisation.ID_localisation", "", true)
				->get();
			
			if (count($query) > 0) {
				foreach ($query as $obj) {
					$id_champignon[] = $obj->ID_champignon;
					$id_localisation[] = $obj->ID_localisation;
					$nom[] = $obj->nom;
					$toxique[] = $obj->toxique;
					$posx[] = $obj->posx;
					$posy[] = $obj->posy;
					$accessibilite[] = $obj->accessibilite;
					$moyenne[] = $obj->moyenne;
				}
				
				$this->setChampignon($id_champignon, $nom, $toxique, $posx, $posy, $accessibilite, $moyenne, $id_localisation);
			}
		}
		//-------------------------- END GETTER ----------------------------------------------------------------------------//
		
		
		//-------------------------- SETTER ----------------------------------------------------------------------------//
		/**
		 * @param $id_champignon
		 * @param $id_localisation
		 * fonction qui permet de supprimer un champignon
		 */
		public function setSupprimerChampignon($id_champignon, $id_localisation) {
			$dbc = App::getDb();
			
			$dbc->delete()->from("champignon")->where("ID_champignon", "=", $id_champignon, "AND")->where("ID_localisation", "=", $id_localisation)->del();
			
			$this->setTestSupprimerLocalisation($id_localisation);
		}
		
		/**
		 * @param $id_localisation
		 * @return bool
		 * fonction utilisée pour savoir si des champignons son encore présents sur cette localisation
		 */
		private function setTestSupprimerLocalisation($id_localisation) {
			$dbc = App::getDb();
			
			$query = $dbc->select()->from("champignon")->where("ID_localisation", "=", $id_localisation)->get();
			
			if (count($query) > 0) {
				return true;
			}
			
			$dbc->delete()->from("localisation")->where("ID_localisation", "=", $id_localisation)->del();
		}
		//-------------------------- END SETTER ----------------------------------------------------------------------------//    
	}