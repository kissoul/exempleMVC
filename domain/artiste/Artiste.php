<?php

class Artiste {
	
        private $_id;
	private $_nom;
	private $_texte;
	
	public function __construct($id, $nom, $texte){
		
                $this->_id =$id;
		$this->_nom =$nom;
		$this->_texte = $texte;
	}
        
        public function getId(){
		return $this->_id;
	}
	
	public function getNom(){
		return $this->_nom;
	}
	
	public function getTexte(){
		return $this->_texte;
	}
	
	public function setNom($nom){
		$this->_nom = $nom;
	}
	
	public function setTexte($texte){
		$this->_texte = $texte;
	}
}