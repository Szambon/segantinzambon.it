<?
session_start();
if(!isset($_SESSION['album'])){
	$_SESSION['err']=1;
	header('Location:Galleria.php');
}
$album=$_SESSION['album'];
header('Content-Type: image/jpeg');
readfile("./Gallery/$album/Galleria".$_GET['id']);
?>
