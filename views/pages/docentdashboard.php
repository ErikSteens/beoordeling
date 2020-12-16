<?php
	class page {

		public function __construct() {
			//Call the databaseconnection
			$this->connection = database::connect();
		}

		public function getHtml() {
			$output = "**Dit is de docent dashboard file in de map CLASSES/PAGES/docentdashboard.php**";

			$output .= $this->tabs();

			return $output;
		}

		private function tabs() {
			//Heredoc


			$output = <<<TABS

				<div class="tab">
				  <button class="tablinks" onclick="openTab(event, 'Basis')">Basis</button>
				  <button class="tablinks" onclick="openTab(event, 'Voldoende')">Voldoende</button>
				  <button class="tablinks" onclick="openTab(event, 'Goed')">Goed</button>
				  <button class="tablinks" onclick="openTab(event, 'Excellent')">Excellent</button>
				</div>

				<div id="Basis" class="tabcontent">
				  <h3>Basis</h3>
				  <p>Hier de basis criteria</p>

				  <input type="checkbox" name="cr1" /> Student moet iets kunnen, namelijk hier typen.

				</div>

				<div id="Voldoende" class="tabcontent">
				  <h3>Voldoende</h3>
				  <p>Hier de voldoende criteria</p>
				</div>

				<div id="Goed" class="tabcontent">
				  <h3>Goed</h3>
				  <p>Hier de Goed criteria</p>
				</div>

				<div id="Excellent" class="tabcontent">
				  <h3>Excellent</h3>
				  <p>Hier de Excellent criteria</p>
				</div>

				<script>
				function openTab(evt, tabName) {
				  var i, tabcontent, tablinks;
				  tabcontent = document.getElementsByClassName("tabcontent");
				  for (i = 0; i < tabcontent.length; i++) {
				    tabcontent[i].style.display = "none";
				  }
				  tablinks = document.getElementsByClassName("tablinks");
				  for (i = 0; i < tablinks.length; i++) {
				    tablinks[i].className = tablinks[i].className.replace(" active", "");
				  }
				  document.getElementById(tabName).style.display = "block";
				  evt.currentTarget.className += " active";
				}
				</script>

TABS;
				return $output;
		}
	}