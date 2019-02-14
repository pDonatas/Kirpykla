<?php
/*
** MainCore.PHP
** 2019 DonatasP
*/

namespace Kirpykla{
	use PDO;
	session_start();
	ob_start();
	class Maincore{
		//Database config
		private $host 		= 'localhost';
		private $user 		= 'root';
		private $pass 		= '';
		private $database 	= 'nfq';

		public $adminpass = 'kirpykla';
		public $pdo;
	    function __construct(){
			try{
				//Establish database connection
				$this->pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->user,$this->pass);
				$this->pdo->query("SET Names 'utf8'");
				$this->pdo->query("SET Character set 'utf8'");
			}catch(PDOException $e){
				echo 'Klaida bandant prisijungti prie MySQL: '.$e->getMessage();
				die();
			}
		}
	}
}
?>