<?php
	
	namespace app\controller;
	
	
	use core\App;
	
	class Champignon {
		protected $id_champignon;
		protected $nom;
		protected $toxique;
		protected $posx;
		protected $posy;
		protected $accessibilite;
		
		//-------------------------- BUILDER ----------------------------------------------------------------------------//
		public function __construct() {
			
		}
		//-------------------------- END BUILDER ----------------------------------------------------------------------------//
		
		
		//-------------------------- GETTER ----------------------------------------------------------------------------//
		public function getIdChampignon(){
			return $this->id_champignon;
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
				}
				
				$this->setChampignon($id_champignon, $nom, $toxique, $posx, $posy, $accessibilite);
			}
		}
		//-------------------------- END GETTER ----------------------------------------------------------------------------//
		
		
		//-------------------------- SETTER ----------------------------------------------------------------------------//
		private function setChampignon($id_champignon, $nom, $toxique, $posx, $posy, $accessibilite) {
			$this->id_champignon = $id_champignon;
			$this->nom = $nom;
			$this->toxique = $toxique;
			$this->posx = $posx;
			$this->posy = $posy;
			$this->accessibilite = $accessibilite;
		}
		//-------------------------- END SETTER ----------------------------------------------------------------------------//    
	}