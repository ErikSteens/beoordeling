<?php
	//DEVELOPMENT MODE
	//TODO: set to productionmode
	error_reporting(E_ALL);
	ini_set("display_errors", "on");

	//Sessionstuff
	session_save_path("sessions");
	session_start();

	//Check and validate userinput
	function checkPost()
    {
        if(isset($_POST))
        {
            foreach($_POST as $key => $value)
            {
                $_POST[$key] = strip_tags(trim(addslashes($value)));
            }
        }
    }

	function checkGet()
    {
        if(isset($_GET))
        {
            foreach($_GET as $key => $value)
            {
                $_GET[$key] = strip_tags(trim(addslashes($value)));
            }
        }
    }
    checkPost();
    checkGet();

	//Constanten voor de paden (path) naam de submappen
	require_once("config/path.inc.php");

	//Set requested page
	$thispage = $_SERVER['PHP_SELF'];
	define("THISPAGE", $thispage);
	unset($thispage);

	//Gebruikersgegevens verzamelen
	define("USER_IP"		, $_SERVER['REMOTE_ADDR']);
	define("USER_AGENT"		, $_SERVER['HTTP_USER_AGENT']);
	//TODO: check more then this .... maybe language?
