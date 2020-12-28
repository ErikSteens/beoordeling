<?php
	class clsLogin extends Core {
		private $username;
		private $password;
		private $validhash;
		private $user_uuid;

		public function __construct() {

		}

		public function checkCredentials($username, $password) {
			//Username == email
			$conn 		= database::dbConnect();
			$date 		= date("Y-m-d");

			$sql 		= "SELECT password from tb_users WHERE email = ? AND startdate <= ? AND enddate >= ?";
			$data		= array($username, $date, $date);
			$statement 	= $conn->prepare($sql);
			$statement->execute($data);
			$results 	= $statement->fetchAll();

			if(isset($results[0]['password'])) {
				$password_db = $results[0]['password'];
				$check = password_verify($password, $password_db);
				if($check) {
					$_SESSION['user']['loggedin'] = true;
					$this->getUserData($this->getUserUuid($username,$password_db));
					$this->getRoleUuid($this->user_uuid);
					//print_r($_SESSION);
					return true;
				} else {
					$_SESSION['user']['loggedin'] = false;
					return false;
				}
			}
		}

		public function getUserUuid($username,$password_db) {
			$conn 		= database::dbConnect();
			$sql 		= "SELECT * from tb_users WHERE email = ? AND password = ?";
			$data 		= array($username, $password_db);
			$statement 	= $conn->prepare($sql);
			$statement->execute($data);
			$results 	= $statement->fetchAll();
			$this->user_uuid = $results[0]['uuid'];
			return $results[0]['uuid'];
		}

		public function getUserData($uuid) {
			$conn 		= database::dbConnect();
			$sql 		= "SELECT * from tb_users WHERE uuid = ?";
			$data 		= array($uuid);
			$statement 	= $conn->prepare($sql);
			$statement->execute($data);
			$results 	= $statement->fetchAll();
			$_SESSION['user']['uuid'] = $results[0]['uuid'];
			$_SESSION['user']['screenname'] = $results[0]['screenname'];
			$_SESSION['user']['email'] = $results[0]['email'];
		}

		public function getRoleUuid($user_uuid) {
			$conn 		= database::dbConnect();
			$sql 		= "SELECT role_uuid from tb_k_role_user WHERE user_uuid = ?";
			$data 		= array($user_uuid);
			$statement 	= $conn->prepare($sql);
			$statement->execute($data);
			$results 	= $statement->fetchAll();
			$_SESSION['user']['role'] = $results[0]['role_uuid'];
		}

		public function validateEmail() {
			//na registreren moet je een bevestigingsemail bevestigen om account actief te maken
			//dat regelt deze functie
		}

		public function checkIP() {
			//hier komt een IP check. Als je voorkomt in de ban, kun je niet inloggen
		}

		public function forgetPassword() {
			//Er wordt gebruikt gemaakt van password_hash en password_verify
			//Hier voeren we password_verify uit
		}

		public function register() {
			//een functie om een nieuwe gebruiker te registreren.
		}

		public function form() {
			$thisPage = $_SERVER['PHP_SELF'];

			$form = <<<LOGINFORMULIER
				<fieldset id="loginform">

					<form action="$thisPage" enctype="multipart/formdata" method="post">
						
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label>
							<input type="email" name="username" class="form-control" 
								id="exampleInputEmail1" aria-describedby="emailHelp" 
								placeholder="Enter email"
								value="e.steens@vistacollege.nl">
						</div>

						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" name="password" class="form-control" 
								id="exampleInputPassword1" 
								placeholder="Password"
								value="erik">
						</div>

						<label></label>
						<input type="hidden" name="frmLogin" id="frmLogin" value="frmLogin" />
						<input type="submit" name="btnLogin" class="btn btn-primary" value="Inloggen" />

					</form>
					<br />
					<a href="">Registeer jezelf</a> | 
					<a href="">Wachtwoord vergeten</a>

				</fieldset>

LOGINFORMULIER;

			return $form;
		}
	}