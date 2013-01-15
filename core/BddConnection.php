<?php

require_once './exception/BddConnectionException.php';

abstract class BddConnection{
	
	/**
 	* 
 	*/
	protected $bdd;
	
	public function __construct(){
		try{
			$this->bdd = new PDO(
								'mysql:dbname=festival;host=localhost;',
								'root',
								'');
		}catch (Exception $e){
			throw new BddConnectionException($e->getMessage());
		}
		
	}
	
	public function getblabla(){
		
	}
}
