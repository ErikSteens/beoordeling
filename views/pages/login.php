<?php
	class page {
		private $connection;

		public function __construct() {
			//Call the databaseconnection
			$this->connection = database::connect();
		}

		public function getHtml() {
			header("Location:index.php"); //redirect na inloggen na de index pagina
			return "Vul je gebruikersgegevens in en klik op de button.";
		}

	}