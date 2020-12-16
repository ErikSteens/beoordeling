<?php
	class page {

		public function __construct() {
			//Call the databaseconnection
			$this->connection = database::connect();
		}

		public function getHtml() {
			$output = "<h1>Dit is de CONTACT !!!!! file in de map CLASSES/PAGES/index.php</h1>";

			return $output;
		}
	}