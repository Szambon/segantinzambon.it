<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?session_start();
function better_crypt($input, $rounds = 7)
  {
    $salt = "";
    $salt_chars = array_merge(range('A','Z'), range('a','z'), range(0,9));
    for($i=0; $i < 22; $i++) {
      $salt .= $salt_chars[array_rand($salt_chars)];
    }
    return crypt($input, sprintf('$2a$%02d$', $rounds) . $salt);
  }
?>
<title>Galleria</title>
<style type="text/css">
.popup{
	visibility:hidden;
	position:fixed;
	top:0;
	left:0;
	width:100%;
	height:100%;
	z-index:10;
}
.trasparenza{
	position:fixed;
	top:-10%;
	left:-10%;
	width:120%;
	height:120%;
	background-color:rgba(0,0,0,.8);
}	

.finestraPopup{
	color:white;
	background-color:#000033;
	position:absolute;
	margin:150px 0 0 250px;
	width:300px;
	height:100px;
	padding:5%;
	opacity:1;
	z-index:50;
}
.layout{
	float:left;
	margin:10px;
	color:white;
	width:140px;
}
#chiudi:hover {
filter:alpha(opacity=50);
-moz-opacity: 0.5; 
opacity: 0.5;
-khtml-opacity: 0.5;}

.album:hover {
filter:alpha(opacity=50);
-moz-opacity: 0.5; 
opacity: 0.5;
-khtml-opacity: 0.5;}

.album {
width:135px;
height:90px;

padding:5px;
background:white;
filter:alpha(opacity=100); 
-moz-opacity: 1.0; 
opacity: 1.0;
-khtml-opacity: 1.0; }
</style>
<script>
	function compari(obj)
	{
		document.getElementById(obj).style.visibility="visible";
	}
	function scompari(obj)
	{
		document.getElementById(obj).style.visibility="hidden";
	}
</script>
</head>

<body bgcolor="#000033" onLoad="<?if(isset($_SESSION['err'])) echo "compari('err');";?>MM_preloadImages('Immagini/Barra/coccinella%20linkout.gif','Immagini/Barra/coccinella%20link.gif','Immagini/Barra/pesciolino%20.gif','Immagini/Barra/pesciolino%20LaFilosofia.gif','Immagini/Barra/pesciolino%20LaFilosofiaout.gif','Immagini/Barra/stellineChiSiamoout.gif','Immagini/Barra/stellineChiSiamo.gif','Immagini/Barra/serpenteComeLavoriamoout.gif','Immagini/Barra/serpenteComeLavoriamo%20.gif','Immagini/Barra/sole%20Personal%20Photographer%20out.gif','Immagini/Barra/sole%20Personal%20Photographer.gif','Immagini/Barra/luna%20galleriaout.gif','Immagini/Barra/luna%20galleria.gif','Immagini/Barra/Pesce%20linkout.gif','Immagini/Barra/Pesce%20link.gif','Immagini/Barra/Cavalluccio%20linkout.gif','Immagini/Barra/Cavalluccio%20link.gif','Immagini/Barra/topolino%20Contattiout.gif','Immagini/Barra/topolino%20Contatti.gif')">
<div style="position:fixed; z-index:2; top:0; left:0; width:100%; background:#000033; padding:10px 0 10px 0;"><table border="0" bordercolor="#FFFFFF" align="center" cellpadding="0" cellspacing="0" >
  <form action="crypt.php" method="POST"><input style="width:800px;" type="text" name="pass" value="<?if(isset($_POST['pass'])){ $str=trim($_POST['pass']);
$stringData = better_crypt($str);
echo $stringData;
} ?>"/><input type="submit"/>
</body>
</html>

