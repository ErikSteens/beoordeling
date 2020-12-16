<?php

	/**
	 * mainmenu class.
	 */
	class mainmenu {


		/**
		 * getHtml function.
		 *
		 * @access public
		 * @return void
		 *
		 * Dit is de code van Bootstrap.
		 * Verander deze naar smaak en eigen inzicht. Vaak is het goed eerst een klein project ernaast
		 * op te starten en te klooien met de code. Als je begrijpt wat je doet kun je deze kennis en
		 * kunde in je echte project gebruiken.
		 */
		public function getHtml() {
			$output = <<<MAINMENU
			<nav class="navbar navbar-expand-lg navbar-light bg-light">

			  <!-- Dit is de plek waar je een logo kunt gebruiken, deze link verwijst naar index.php -->
			  <a class="navbar-brand" href="index.php"><i class="fab fa-wpforms"></i></a>


			  <button class="navbar-toggler" type="button"
			  		data-toggle="collapse" data-target="#navbarSupportedContent"
			  		aria-controls="navbarSupportedContent" aria-expanded="false"
			  		aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto">

			      <!-- HOME LINK -->
			      <li class="nav-item active">
			        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
			      </li>

			     <!-- MENUITEM 1 LINK -->
			      <li class="nav-item">
			        <a class="nav-link" href="docentdashboard.php">Docent dashboard</a>
			      </li>

			      <li class="nav-item">
			        <a class="nav-link" href="studentdashboard.php">Student dashboard</a>
			      </li>

			       <li class="nav-item">
			        <a class="nav-link" href="contact.php">Contact</a>
			      </li>

			      <!-- DROPDOWN ITEM -->
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle"
			        	href="#" id="navbarDropdown"
			        	role="button" data-toggle="dropdown"
			        	aria-haspopup="true" aria-expanded="false">

			         	Formulieren
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item" href="#">Maak nieuw formulier</a>
			          <a class="dropdown-item" href="#">Pas formulier aan</a>
			          <div class="dropdown-divider"></div>
			          <a class="dropdown-item" href="#">Menuitem 3 pas zelf aan</a>
			        </div>
			      </li>

					<!-- LOGIN BUTTON -->
					<li class="nav-item">
MAINMENU;

					//Toon inlogbutton of Uitlogbutton
					if(isset($_SESSION['user']['loggedin'])) {
						if($_SESSION['user']['loggedin'] == true) {
							$output .= '<a class="nav-link" href="logout.php">Uitloggen</a>';
						} else {
							$output .= '<a class="nav-link" href="login.php">Inloggen</a>';
						}
					} else {
						$output .= '<a class="nav-link" href="login.php">Inloggen</a>';
					}

			$output .= <<<MAINMENU
				    </li>
			    </ul>


			  </div>
			</nav>
MAINMENU;
			return $output;
		}
	}