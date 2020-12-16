<?php
	class secure {
		/*
			* Static betekent dat er geen instantie/object van de class gemaakt hoeft te worden.
			* Na includen van deze file kun je de function aanspreken zonder
			* de regel met "objSecure = new secure();" te gebruiken.
			* Doe dit wel: $checkSecure = secure::checkPage(PAGE);
		*/

		public static function checkPage($page) {
			//checkt of de requested page beveiligd is met login of niet
			//False betekent geen inlog nodig, dus pagina tonen
			//True betekent Inlog is WEL nog, dus checken of gebruiker is ingelogd, zo niet Loigin pagina tonen

			switch($page) {
				case "index"				: return false; break;
				case "logout"				: return true; break;
				case "docentdashboard" 		: return true; break;
				case "studentdashboard"		: return true; break;
				case "login"				: return true; break;
				case "contact"				: return false; break;
				default						: return true; //Default show login.php
			}
		}


	}