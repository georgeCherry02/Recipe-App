<?php
	//Fix error reporting
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	//Start a PHP Session
	session_start();

	//Include sitewide php constants
	$rootExt = isset($root) ? "" : "../";
	include_once $rootExt . "inc/constants.inc.php";
	
	//Create a database object
	$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
	$db = new PDO($dsn, DB_USER, DB_PASS);
?>
