<?php
	class Connect
	{
		private const dns = 'mysql:host=localhost;dbname=nckh';
		private const user = 'root';
		private const passw = '';
		protected $pdo = null;
		function __construct()
		{
			try {
				$this->pdo = new PDO(self::dns, self::user, self::passw);
				$this->pdo->query("SET NAMES utf8");
			} catch (PDOException $e) {
				echo $e->getMessage();	
				exit();
			}
		}
	}