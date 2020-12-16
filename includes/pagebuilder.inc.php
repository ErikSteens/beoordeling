<?php

	/**
	 * pagebuilder class.
	 */
	class pagebuilder {
			private $showLoginForm = true;

			/**
			 * __construct function.
			 *
			 * @access public
			 * @return void
			 */
			public function __construct() {
				$this->definePage();

				//Initialisatie: classes includen en er een instantie (object) van maken.
				//Deze objecten worden later in de template functions gebruikt.

				//Config: database
				require_once(CONFIG_PATH . "database.inc.php");
				require_once(CLASSES_PATH . "clsSecure.php");

				if(isset($_POST['frmLogin'])) {
					$check = $this->checkCredentials();
				}
				$this->checkSecurePage();

				//<HEAD>
				require_once(INCLUDES_PATH . "head.inc.php");
				$this->head = new head;

				//<CONTENT>
				require_once(INCLUDES_PATH . "mainmenu.inc.php");
				$this->mainmenu = new mainmenu;
				require_once(INCLUDES_PATH . "submenu.inc.php");
				$this->submenu = new submenu;
				require_once(INCLUDES_PATH . "content.inc.php");
				$this->content = new content;

				//<FOOTER>
				require_once(INCLUDES_PATH . "footer.inc.php");
				$this->footer = new footer;

			}

			/**
			 * definePage function.
			 *
			 * @access private
			 * @return void
			 */
			private function definePage() {
				/*
					Hier wordt de URL bekeken en bepaald
					aan de hand van de paginanaam om welke pagina het gaat.
					Vervolgens wordt deze CONSTANTE: PAGE in de verdere applicatie gebruikt
					om keuzes te maken.
				*/
				$url 	= $_SERVER['REQUEST_URI'];
				$page 	= pathinfo( parse_url( $url, PHP_URL_PATH ), PATHINFO_FILENAME );
				define("PAGE", $page);
			}

			private function checkCredentials() {
				if(file_exists(CLASSES_PATH . "clsLogin.php")) {

					//First get Credentials and pass them to clsLogin
					//I use this technic because I want the clsLogin to be independent from the input
					$username = $_POST['username'];
					$password = $_POST['password'];

					require_once(CLASSES_PATH . "clsLogin.php");
					$objLogin = new clsLogin();
					return $objLogin->checkCredentials($username, $password);
				}
				return false;
			}

			private function checkSecurePage() {
				$objSecure = secure::checkPage(PAGE);
				if($objSecure == true) {
					if(isset($_SESSION['user']['loggedin'])) {
						if($_SESSION['user']['loggedin'] == true) {
							$this->showLoginForm = false;
							return;
						}
					}
					$this->showLoginForm = true;
				} else {
					$this->showLoginForm = false;
				}
			}

			/**
			 * getTemplate function.
			 *
			 * @access public
			 * @return void
			 */
			public function getTemplate($template="Default") {
				$template = ucfirst($template);
				include_once("views/$template.php");
				//return the entire requested page
				return $output;
			}
		}