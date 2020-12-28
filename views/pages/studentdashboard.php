<?php
	class page {

		public function __construct() {
			//Call the databaseconnection
			//$this->connection = database::connect();
		}

		public function getHtml() {
			$output = "Dit is de studentdashboard file in de map CLASSES/PAGES/studentdashboard.php";

			return $output;
		}
	}