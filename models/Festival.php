<?php

require_once './core/BddConnection.php';
require_once './domain/artiste/Artiste.php';

class Festival extends BddConnection{
	
	public function insertArtiste($oArtiste){
		$statement = $this->bdd->prepare("INSERT INTO `artiste` (`artiste`.`nom`, `artiste`.`textArtiste`) VALUES (:nom, :texte)");
		$statement->execute(array(':nom' => $oArtiste->getNom(),
								  ':texte' => $oArtiste->getTexte));
		
	}
        
        public function insertArtisteTest($oArtiste){
		$statement = $this->bdd->prepare("INSERT INTO `artiste` (`artiste`.`nom`, `artiste`.`textArtiste`) VALUES (:nom, :texte)");
		$statement->execute(array(':nom' => $oArtiste->getNom(),
								  ':texte' => $oArtiste->getTexte));
		
	}
        
        public function insertArtisteTest2($oArtiste){
		$statement = $this->bdd->prepare("INSERT INTO `artiste` (`artiste`.`nom`, `artiste`.`textArtiste`) VALUES (:nom, :texte)");
		$statement->execute(array(':nom' => $oArtiste->getNom(),
								  ':texte' => $oArtiste->getTexte));
		
	}
	
	public function getArtisteById($idArtiste){
		$statement = $this->bdd->prepare("SELECT `artiste`.`idArtiste`, `artiste`.`nomArtiste`, `artiste`.`textArtiste` FROM `artiste` WHERE `artiste`.`idArtiste` = :idArtiste");
		$statement->execute(array(':idArtiste' => $idArtiste));
		$result = $statement->fetch(PDO::FETCH_OBJ);
		return new Artiste($result->idArtiste, $result->nomArtiste, $result->textArtiste);
	}
	
}