<?php

require_once './domain/artiste/Artiste.php';

class tutoriels extends Controller{
	
	private $_xmlIterator;
	private $_book;
	private $_oArtiste;
	
	
	public function index(){
            $this->loadModel('Festival');
            $this->_oArtiste = $this->Festival->getArtisteById(1);

            $aInfoForViewIndex = array(
                    'titre' => 'Page d\'accueil',
                    'description' => 'Description de la page d\'accueil',
                    'artiste' => $this->_oArtiste
            );
            $this->set($aInfoForViewIndex);
            $this->render('index');					
	}
        
        public function testNouveau(){
            
        }
        
        public function testNouveauEncore(){
            
        }
        
        public function testNouveauEncore2(){
            
        }
        
        public function testNouveauEncore3(){
            
        }
        
		public function testNouveauEncore4(){
            
        }
        
        public function description($idArtiste){
            
            $this->loadModel('Festival');
            $this->_oArtiste = $this->Festival->getArtisteById($idArtiste);
            
            $aInfoForViewIndex = array(
                    'artisteDescription' => $this->_oArtiste->getTexte(),
            );
            $this->set($aInfoForViewIndex);
            $this->render('description');	
        }
	
	private function getXml(){
		$file = file_get_contents('./book.xml');
		try {
			$this->_xmlIterator = new SimpleXMLIterator($file);
				foreach($this->_xmlIterator as $book){
						$attributesOfBook = $book->attributes();
						echo '<br />'.'<i>Identifiant du livre : </i>'.$attributesOfBook['id'].'<br />';
					foreach ($book as $bookAttributes){
						echo '<i>'.$bookAttributes->getName().' : </i>'.$bookAttributes.'<br />';
					}
						echo '<br />';	
				}
			
		} catch (Exception $e){
			echo $e->getMessage();
		}
	}
}