<?
$cosa=$_POST['cosa'];
$dove = $_POST['dove'];
switch($cosa)
{
	case "Nome":
	case "Didascalia":
	case "Sigla":
		break;
	default:
		$location = $_SESSION['lang'];
		if(!$location)
		{
			$location = "IT";
		}
		include('./'.$location.'/400.html');
		die();
}
require_once('DBConnect.php');
$stmt = null;
if(!$dbConnection)
{
	$location = $_SESSION['lang'];
	if(!$location)
	{
		$location = "IT";
	}
	include('./'.$location.'/500.html');
	die();
}
if($_POST['dove']!='Ad'){
$stmt = $dbConnection->prepare('SELECT * FROM PrivateAlbums WHERE Cartella = :dove', array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

$stmt->execute(array(':dove' => $dove));
}
else{
$stmt = $dbConnection->prepare('SELECT * FROM PrivateAlbums WHERE Cartella IS NULL');
$stmt->execute();
}
$row = $stmt->fetch();
if($row)
	echo $row[$cosa];
?>
