<?php
	class page {
		private $connection;

		public function __construct() {
			//Call the databaseconnection
			//$this->connection = database::dbConnect();
		}

		public function getHtml() {
			header("Location:index.php"); //redirect na inloggen na de index pagina
		}

	}