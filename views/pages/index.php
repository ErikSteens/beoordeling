<?php
	require_once(VIEWS_PATH . "clsCoreView.inc.php");
	class page extends clsCoreView {

		public function __construct() {
			
		}

		public function getHtml() {
			$output = "Dit is de index file in de map CLASSES/PAGES/index.php";
			$ListStudents = $this->getListStudents();
			return $this->showListStudents($ListStudents); 	
		}

		private function getListStudents() {
			require_once(CLASSES_PATH . "clsStudent.php");
			$objStudent = new Student();
			$result = $objStudent->getListAll();
			return $result;
		}

		private function showListStudents($ListStudents) {
			$excludeColumns = array("uuid", "timestamp", "status", "class_id");
			$columnNames = array('firstname'=>'Voornaam',
									'middlename'=>'Voorvoegsel',
									'lastname'=>'Achternaam',
									'studentnumber'=>'Studentnummer'
									);
			$output = $this->tableView($ListStudents, "uuid", $excludeColumns, $columnNames);
			return $output;
		}
	}