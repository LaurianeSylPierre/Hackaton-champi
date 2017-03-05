<?php
	
	namespace app\controller;
	
	
	use core\App;
	
	class Champignon {
		protected $id_champignon;
		protected $id_localisation;
		protected $nom;
		protected $toxique;
		protected $posx;
		protected $posy;
		protected $accessibilite;
		protected $moyenne;
		
		//-------------------------- BUILDER ----------------------------------------------------------------------------//
		public function __construct() {
			
		}
		//-------------------------- END BUILDER ----------------------------------------------------------------------------//
		
		
		//-------------------------- GETTER ----------------------------------------------------------------------------//
		public function getIdChampignon(){
			return $this->id_champignon;
		}
		public function getIdLocalisation(){
		    return $this->id_localisation;
		}
		public function getNom(){
			return $this->nom;
		}
		public function getToxique(){
		    return $this->toxique;
		}
		public function getPosx(){
		    return $this->posx;
		}
		public function getPosy(){
		    return $this->posy;
		}
		public function getAccessibilite(){
		    return $this->accessibilite;
		}
		public function getMoyenne(){
		    return $this->moyenne;
		}
		
		public function getAllChampignon() {
			$dbc = App::getDb();
			
			$query = $dbc->select()
				->from("champignon")
				->from("localisation")
				->where("champignon.ID_localisation", "=", "localisation.ID_localisation", "", true)
				->get();
			
			if (count($query) > 0) {
				foreach ($query as $obj) {
					$id_champignon[] = $obj->ID_champignon;
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
		
		/**
		 * @param $id_champignon
		 * @return int
		 * fonction pour récupérer les likes d'un champignon
		 */
		private function getLikeChampignon($id_champignon) {
			$dbc = App::getDb();
			
			$query = $dbc->select("vote_pos")->from("champignon")->where("ID_champignon", "=", $id_champignon)->get();
			
			if (count($query) == 1) {
				foreach ($query as $obj) {
					return $obj->vote_pos;
				}
			}
			
			return 0;
		}
		
		/**
		 * @param $id_champignon
		 * @return int
		 * fonction qui renvoi le nombre de dislike d'un champignon
		 */
		private function getDisLikeChampignon($id_champignon) {
			$dbc = App::getDb();
			
			$query = $dbc->select("vote_neg")->from("champignon")->where("ID_champignon", "=", $id_champignon)->get();
			
			if (count($query) == 1) {
				foreach ($query as $obj) {
					return $obj->vote_neg;
				}
			}
			
			return 0;
		}
		
		/**
		 * @param $id_champignon
		 * @return int
		 * renvoi la moyenne d'un champignon
		 */
		private function getMoyenneChampignon($id_champignon) {
			$dbc = App::getDb();
			
			$query = $dbc->select("moyenne")->from("champignon")->where("ID_champignon", "=", $id_champignon)->get();
			
			if (count($query) == 1) {
				foreach ($query as $obj) {
					return $obj->moyenne;
				}
			}
			
			return 50;
		}
		//-------------------------- END GETTER ----------------------------------------------------------------------------//
		
		
		//-------------------------- SETTER ----------------------------------------------------------------------------//
		protected function setChampignon($id_champignon, $nom, $toxique, $posx, $posy, $accessibilite, $moyenne, $id_localisation) {
			$this->id_champignon = $id_champignon;
			$this->id_localisation = $id_localisation;
			$this->nom = $nom;
			$this->toxique = $toxique;
			$this->posx = $posx;
			$this->posy = $posy;
			$this->accessibilite = $accessibilite;
			$this->moyenne = $moyenne;
		}
		
		/**
		 * @param $id_champignon
		 * fonction pour ajouter un like au champignon
		 */
		public function setAddLike($id_champignon) {
			$dbc = App::getDb();
			
			$dbc->update("vote_pos", $this->getLikeChampignon($id_champignon)+1)->from("champignon")->where("ID_champignon", "=", $id_champignon)->set();
			
			$this->setCalculMoyenne($id_champignon, "+");
		}
		
		/**
		 * @param $id_champignon
		 * fonction pour ajouter un dislike
		 */
		public function setAddDislike($id_champignon) {
			$dbc = App::getDb();
			
			$dbc->update("vote_neg", $this->getDisLikeChampignon($id_champignon)+1)->from("champignon")->where("ID_champignon", "=", $id_champignon)->set();
		
			$this->setCalculMoyenne($id_champignon, "-");
		}
		
		/**
		 * @param $id_champignon
		 * @param $signe
		 * fonction qui recalcule la moyenne
		 */
		public function setCalculMoyenne($id_champignon, $signe) {
			$dbc = App::getDb();
			
			if ($signe == "-") {
				$moyenne = $this->getMoyenneChampignon($id_champignon)-1;
			}
			else {
				$moyenne = $this->getMoyenneChampignon($id_champignon)+1;
			}
			
			$dbc->update("moyenne", $moyenne)->from("champignon")->where("ID_champignon", "=", $id_champignon)->set();
		}
		//-------------------------- END SETTER ----------------------------------------------------------------------------//    
	}