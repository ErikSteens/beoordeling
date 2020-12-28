<?php
	abstract class Secure {
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
				case "challenges"			: return true; break;
				default						: return true; //Default show login.php
			}
		}

		public static function checkRights() {
			if( isset( $_SESSION['user']['role'] ) ) {
				if( strlen( $_SESSION['user']['role'] ) == 36) {
					$role_uuid	= $_SESSION['user']['role'];
					$page 		= PAGE;
					$conn 		= database::dbConnect();
					$sql 		= "SELECT id from tb_pagerights WHERE page = ? AND role_uuid = ? AND status = ?";
					$data 		= array($page, $role_uuid, 1);
					$statement 	= $conn->prepare($sql);
					$statement->execute($data);
					$count = $statement->rowCount();
					if($count == 1) {
						return true;
					}
					return false;
				}
			}
			return false;
		}

		public static function checkActionRights() {
			return true;
		}

	}