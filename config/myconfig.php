<?php 

	class Connect
	{
		private $dns = "mysql:host=localhost;dbname=website_docongso";
		private $user = "root";
		private $pass = "";
		protected $pdo = null;
		function __construct()
		{
			try{
				$this->pdo = new PDO($this->dns, $this->user, $this->pass);
				$this->pdo->query("SET NAMES utf8");

			}catch(PDOException $e){
				echo $e->getMessage();
				exit();
			}
		}

	}

	// class Connect
	// {
	// 	private $dns = "mysql:host=localhost;dbname=php1120e_webfashion";
	// 	private $user = "php1120e_admin";
	// 	private $pass = "122345";
	// 	protected $pdo = null;
	// 	function __construct()
	// 	{
	// 		try{
	// 			$this->pdo = new PDO($this->dns, $this->user, $this->pass);
	// 			$this->pdo->query("SET NAMES utf8");

	// 		}catch(PDOException $e){
	// 			echo $e->getMessage();
	// 			exit();
	// 		}
	// 	}
	// }

?>