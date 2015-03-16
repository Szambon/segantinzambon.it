<?
function better_crypt($input, $rounds = 7)
  {
    $salt = "";
    $salt_chars = array_merge(range('A','Z'), range('a','z'), range(0,9));
    for($i=0; $i < 22; $i++) {
      $salt .= $salt_chars[array_rand($salt_chars)];
    }
    return crypt($input, sprintf('$2a$%02d$', $rounds) . $salt);
  }
function prob(){
	echo 3;
}
session_start();
if(!isset($_POST['password']) || !isset($_POST['fold'])){
	echo 1;
}
$password=trim($_POST['password']);
require('DBConnect.php');
$result = $dbConnection->prepare('SELECT Password FROM PrivateAlbums WHERE Cartella IS NULL');
$result->execute();
$result = $result->fetch();
$passad=$result['Password'];
if(crypt($password, $passad)==$passad){
	if($_POST['fold']=='Ad'){
		$_POST['fold'] = null;
	}
	if(isset($_POST['nuova'])){
		$result = $dbConnection->prepare("INSERT INTO PrivateAlbums (Nome, Didascalia, Sigla, Password, Cartella) VALUES (:nome, :didascalia, :sigla, :password, :cartella) ON DUPLICATE KEY UPDATE Nome = :nome2, Didascalia = :didascalia2, Sigla = :sigla2, Password = :password2", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$result->execute(array(':nome' => $_POST['nome'], ':didascalia' => $_POST['did'], ':sigla' => $_POST['sigla'], ':password' => better_crypt(trim($_POST['nuova'])), ':cartella' => $_POST['fold'], ':nome2' => $_POST['nome'], ':didascalia2' => $_POST['did'], ':sigla2' => $_POST['sigla'], ':password2' => better_crypt(trim($_POST['nuova']))));
		echo 2;
	}
}
else{
echo 1;
}
?>
