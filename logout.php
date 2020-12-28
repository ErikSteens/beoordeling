<?php
	session_save_path("sessions");
	session_start();
	if(isset($_SESSION['user']['loggedin'])) {
		$_SESSION['user']['loggedin'] = false;
	}

	//Just to be sure.. :-)
	$_SESSION = "";
	session_destroy();
	session_regenerate_id();
	session_start();

	//Keer terug naar de pagina waarvan je uitlogd
	$referer = $_SERVER['HTTP_REFERER'];
	header("location:" . $referer);