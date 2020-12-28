<?php
	//DEVELOPMENT MODE
	//TODO: set to productionmode
	error_reporting(E_ALL);
	ini_set("display_errors", "on");

    //Sessionstuff
    function is_session_started()
    {
        if ( php_sapi_name() !== 'cli' ) {
            if ( version_compare(phpversion(), '5.4.0', '>=') ) {
                return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
            } else {
                return session_id() === '' ? FALSE : TRUE;
            }
        }
        return FALSE;
    }

    // chweck if session has started
    if ( is_session_started() === FALSE ) {
        session_save_path("sessions");
        session_start();
    }
    
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
	//TODO: maybe check more then this ....?
