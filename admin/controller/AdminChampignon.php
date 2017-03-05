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
			
			foreach ($query as $obj) {
				$id_champignon[] = $obj->ID_champignon;
				$nom[] = $obj->nom;
				$toxique[] = $obj->toxique;
				$posx[] = $obj->posx;
				$posy[] = $obj->posy;
			}
			
			$this->setBadMoyenneChampignon($id_champignon, $nom, $toxique, $posx, $posy);
		}
		//-------------------------- END GETTER ----------------------------------------------------------------------------//
		
		
		//-------------------------- SETTER ----------------------------------------------------------------------------//
		private function setBadMoyenneChampignon($id_champignon, $nom, $toxique, $posx, $posy) {
			$this->id_champignon = $id_champignon;
			$this->nom = $nom;
			$this->toxique = $toxique;
			$this->posx = $posx;
			$this->posy = $posy;
		}
		//-------------------------- END SETTER ----------------------------------------------------------------------------//    
	}