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
$passad=trim(file_get_contents("./4eb712ac0c195316469261b39d07f09f.txt"));
if(crypt($password, $passad)==$passad){
	if($_POST['fold']!='Ad'){
	if(isset($_POST['nuova'])){
	file_put_contents("./Gallery/".$_POST['fold']."/Info/Password.txt", better_crypt(trim($_POST['nuova']))) or die(prob());}
	file_put_contents("./Gallery/".$_POST['fold']."/Info/Nome.txt", $_POST['nome']) or die(prob());
	file_put_contents("./Gallery/".$_POST['fold']."/Info/Didascalia.txt", $_POST['did'].'¦'.$_POST['sigla']) or die(prob());
	echo 2;
	}
	else{
	file_put_contents("./4eb712ac0c195316469261b39d07f09f.txt", better_crypt(trim($_POST['nuova']))) or die(prob());
	echo 2;
}
}
else{
echo 1;
}
?>
