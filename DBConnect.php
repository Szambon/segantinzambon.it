<?php 
	$location = $_SESSION['lang'];
	if(!$location)
	{
		$location = "IT";
	}
	require('DBCredentials.php');
	try
	{
		$dbConnection = new PDO('mysql:dbname=Sql841462_1;host='.$host.';charset=utf8', $DB_User, $DB_Pass);

		$dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
		header('HTTP/1.1 500 Server Error');
		include('./'.$location.'/500.html');
		die();
	}
?>