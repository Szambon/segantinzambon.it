<?
$cosa=$_POST['cosa'];
if($_POST['dove']!='Ad'){
$dove='./Gallery/'.trim($_POST['dove']).'/Info/';
$testo=file_get_contents($dove.$cosa);
}
else{
	if($cosa=='Nome.txt'){
		$testo='Segantin&Zambon';
	}
	if($cosa=='Didascalia.txt'){
		$testo='Pannello¦Amministrazione';
	}
}
echo $testo;
?>
