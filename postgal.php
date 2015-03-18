<?php
session_start();
$password=$_POST['password'];
$password=trim($password);
require('DBConnect.php');
$location = $_POST['lang'];
if(!$location)
{
	$location = "IT";
}
$_SESSION['lang'] = $location;
$result = $dbConnection->prepare("SELECT * FROM PrivateAlbums WHERE Cartella IS NOT NULL");
$result->execute();
$result = $result->fetchAll();
foreach($result as $row)
{
	if(crypt($password, $row['Password'])==$row['Password']){
		header("Location: album.php");
		$_SESSION['album']=($row['Cartella']);
		exit();
	}
}
	header('HTTP/1.1 401 Unauthorized');
	include('./'.$location.'/401.html');
	die();
?>