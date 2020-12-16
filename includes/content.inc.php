<?php
	/**
	 * content class
	 */
	class content {
		//Open in de map /classes/pages de bijbehorende file
		//Als de aangevraagde file (requested file) niet bestaat wordt automatisch de index geladen
		// Maak voor elke pagina een nieuwe file aan in de map CLASSES/PAGES met als naam de requested page
		public function getHtml() {
		if(file_exists(PAGES_PATH . PAGE . ".php")) {
				require_once(PAGES_PATH . PAGE . ".php");
			} else {
				require_once(PAGES_PATH . "index.php");
			}
			$page = new page;
			return $page->getHtml();
		}
	}
?>