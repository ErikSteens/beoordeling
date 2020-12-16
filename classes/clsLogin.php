<?php
	class clsLogin {
		private $username;
		private $password;
		private $validhash;


		public function __construct() {

		}

		public function checkCredentials($username, $password) {
			//Hier komt de code om te kunnen inloggen.
			//Mag je zelf aan werken, maar ik zal deze maken.
			//Je kunt nu uit de voeten met een return true.
			// Als je deze op false zet, kun je niet meer inloggen, probeer dat maar eens.

			//Username == email
			$conn 		= database::connect();
			$sql 		= "SELECT password from tb_users WHERE email = ?";
			$statement 	= $conn->prepare($sql);
			$statement->execute([$username]);
			$results 	= $statement->fetchAll();

			/*$options = [
			    'cost' => 12,
			];
			echo password_hash("erik", PASSWORD_BCRYPT, $options);*/
			if(isset($results[0]['password'])) {
				$password_db = $results[0]['password'];

				$check = password_verify($password, $password_db);

				if($check) {
					$_SESSION['user']['loggedin'] = true;
					return true;
				} else {
					$_SESSION['user']['loggedin'] = false;
					return false;
				}
			}


		}

		public function validateEmail() {
			//na registreren moet je een bevestigingsemail bevestigen om account actief te maken
			//dat regelt deze functie
		}

		public function checkIP() {
			//hier komt een IP check. Als je voorkomt in de ban, kun je niet inloggen
		}

		public function checkPassword() {
			//Er wordt gebruikt gemaakt van password_hash en password_verify
			//Hier voeren we password_verify uit
		}

		public function register() {
			//een functie om een nieuwe gebruiker te registreren.
		}

		public function form() {
			$thisPage = $_SERVER['PHP_SELF'];

			$form = <<<LOGINFORMULIER

				<fieldset>

					<form action="$thisPage" enctype="multipart/formdata" method="post">
						<label>Gebruikersnaam</label>
						<input type="text" name="username" value="" placeholder="Gebruikersnaam" />

						<label>Wachtwoord</label>
						<input type="password" name="password" value="" placeholder="Wachtwoord" />

						<label></label>
						<input type="hidden" name="frmLogin" id="frmLogin" value="frmLogin" />
						<input type="submit" name="btnLogin" value="Inloggen" />
					</form>

				</fieldset>

LOGINFORMULIER;

			return $form;
		}
	}