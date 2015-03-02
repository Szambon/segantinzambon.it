<?php
session_start();
$password=$_POST['password'];
$handle = opendir('./Gallery');
$cartelle=array();
$numero=0;
while ($entr = readdir($handle)) {
		if ($entr != "." && $entr != "..") {
			$cartelle[$numero]=$entr;
			$numero++;
		}
}
$collegato=false;
$password=trim($password);
for($i=0; $i<$numero; $i++){
   $entry=(string)(file_get_contents("./Gallery/".$cartelle[$i]."/Info/Password.txt"));
   $entry=trim($entry);
   if(crypt($password, $entry)==$entry){
      $_SESSION['album']=($cartelle[$i]);
      echo "<script>top.location = 'album.php'</script>";
	  $collegato=true;
   }
}
if(!$collegato){?>
	<html>
<head>
<title>Segantin Zambon - 403 Error - Permesso Negato</title>
</head>

<body>

<h1>403 - Permesso Negato</h1>
<p>

<blockquote>

Non hai i permessi per ricevere l'URL o il link richiesto. 
&nbsp;&nbsp; A causa di fallita verifica credenziali o altro.<p>

Per favore informa gli amministratori, se pensi che sia un errore.

</blockquote>

</body>
</html>
<?
}?>