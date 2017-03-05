<?php
	
	namespace app\controller;
	
	
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
		//-------------------------- END GETTER ----------------------------------------------------------------------------//
		
		
		//-------------------------- SETTER ----------------------------------------------------------------------------//
		//-------------------------- END SETTER ----------------------------------------------------------------------------//    
	}