<?php
	/**
	 * Require_once means you need these files to continu execute the code
	 * This init file contains all code to start properly, like paths info and other config like stuff
	 * Study the file and try to follow the route of the code
	 */
	require_once("config/init.inc.php");

	/**
	 * You can find the constant INCLUDES_PATH in the config/path.inc.php file.
	 * It makes PHP types the path instead of you doing:
	 * require_once("classes/pagebuilder.inc.php");
	 */

	//Create an instance (object) of the class pagebuilder
	require_once(INCLUDES_PATH . "pagebuilder.inc.php");
	$objPagebuilder = new pagebuilder();

	//Choose your template, is optional, else default template is returned
	echo $objPagebuilder->getTemplate();