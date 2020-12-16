<?php
	$output = "";

	/**
	 * This is the template for every requested page
	 */
	$output .= '<!DOCTYPE html>';
	$output .= '<html>';
		$output .= '<head>';
			$output .= $this->head->getHtml();
		$output .=	'</head>';

		$output .=	'<body lang="nl">';

			$output .=	'<header>';
				$output .= '<div id="topbar"></div>';
				$output .= $this->mainmenu->getHtml();
			$output .=	'</header>';

			$output .= '<content>';
					$output .= '<div class="col-xs-12 col-sm-12 col-lg-12">';

						//Als gebruiker niet is ingelogd en dit wel moet doen dan toon het inlogformulier
						if($this->showLoginForm == true) {
							include_once(CLASSES_PATH . "clsLogin.php");
							$objLogin = new clsLogin();
							$output .= $objLogin->form();
						} else {
							$output .= $this->content->getHtml();
						}
					$output .= '</div>';
				$output .= '</div>'; //end class=row
			$output .=	'</content>';

			$output .=	'<footer>';
				$output .= "<hr />" .$this->footer->getHtml();
			$output .=	'</footer>';

		$output .=	'</body>';
	$output .=	'</html>';