<?php
	class database {
		private static $numrows = 0;

		public static function dbConnect() {
			$dbhost     = "localhost";
			$dbname     = "db_beoordeling";
			$dbuser     = "usr_beoordeling";
			$dbpass     = 'Passwd_$159$_Be00rdeling';
			$conn       = "";          // connection string
			$pdo        = "";          // handler
			$charset = 'utf8mb4';

			$conn = "mysql:host=" . $dbhost . "; dbname=" . $dbname . ";charset=". $charset;
			
			$options = [ // define options for PDO connection
				PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // give error in case of issue
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // get row indexed by column name
				PDO::ATTR_EMULATE_PREPARES   => false,
			];
			try {
				$pdo = new PDO($conn, $dbuser, $dbpass, $options); // create connection
				return $pdo;
				//print_r($pdo); // DEVELOPERS CODE !!!!!
			}
			catch (\PDOException $e) {
				throw new \PDOException($e->getMessage(), (int)$e->getCode());
			}
		}

		public static function getData($p_sSql, $p_aData = "", $print=false) {
			// execute query on Mysql server
			$pdo = Database::dbConnect();
			$stmt = $pdo->prepare($p_sSql);
            if(is_array($p_aData)) {
	            $stmt->execute($p_aData);
            } else {
	            $stmt->execute();
            } 	
			database::$numrows = $stmt->rowCount();
			$result = $stmt->fetchAll(); // get result
			if($print === true) { print_r($result); }
			return $result; // dabase query result
		}

		public static function getNumrows() {
			return database::$numrows;
		}

		public static function jsonParse($p_sValue) {
			if(is_array($p_sValue)) {
				return json_encode($p_sValue);
			}
			if(is_string($p_sValue)) {
				return json_decode($p_sValue);
			}
		}
	}
?>