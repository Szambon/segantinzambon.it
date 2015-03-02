<? /*<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<? session_start();?>
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
	top:20%;
	left:30%;
	width:300px;
	height:100px;
	padding:5%;
	opacity:1;
	z-index:50;
}
.layout{
	text-align:center;
	float:left;
	margin:10px;
	color:white;
	width:200px;
height:120px;
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
max-width:135px;
max-height:90px;

padding:5px;
background:white;
filter:alpha(opacity=100); 
-moz-opacity: 1.0; 
opacity: 1.0;
-khtml-opacity: 1.0; }
</style>
<script>
function MM_preloadImages() { var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}}function MM_findObj(n, d) {  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);  if(!x && d.getElementById) x=d.getElementById(n); return x;}function MM_nbGroup(event, grpName) {  var i,img,nbArr,args=MM_nbGroup.arguments;  if (event == "init" && args.length > 2) {    if ((img = MM_findObj(args[2])) != null && !img.MM_init) {      img.MM_init = true; img.MM_up = args[3]; img.MM_dn = img.src;      if ((nbArr = document[grpName]) == null) nbArr = document[grpName] = new Array();      nbArr[nbArr.length] = img;      for (i=4; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {        if (!img.MM_up) img.MM_up = img.src;        img.src = img.MM_dn = args[i+1];        nbArr[nbArr.length] = img;    } }  } else if (event == "over") {    document.MM_nbOver = nbArr = new Array();    for (i=1; i < args.length-1; i+=3) if ((img = MM_findObj(args[i])) != null) {      if (!img.MM_up) img.MM_up = img.src;      img.src = (img.MM_dn && args[i+2]) ? args[i+2] : ((args[i+1])? args[i+1] : img.MM_up);      nbArr[nbArr.length] = img;    }  } else if (event == "out" ) {    for (i=0; i < document.MM_nbOver.length; i++) {      img = document.MM_nbOver[i]; img.src = (img.MM_dn) ? img.MM_dn : img.MM_up; }  } else if (event == "down") {    nbArr = document[grpName];    if (nbArr)      for (i=0; i < nbArr.length; i++) { img=nbArr[i]; img.src = img.MM_up; img.MM_dn = 0; }    document[grpName] = nbArr = new Array();    for (i=2; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {      if (!img.MM_up) img.MM_up = img.src;      img.src = img.MM_dn = (args[i+1])? args[i+1] : img.MM_up;      nbArr[nbArr.length] = img;  } }}//
</script>
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
	<script type="text/javascript" src="dom-drag.js"></script>
</head>

<body bgcolor="#929292" onLoad="<?if(isset($_SESSION['err'])) echo "compari('err');";?>MM_preloadImages('Immagini/Barra/coccinella%20linkout.gif','Immagini/Barra/coccinella%20link.gif','Immagini/Barra/pesciolino%20.gif','Immagini/Barra/pesciolino%20LaFilosofia.gif','Immagini/Barra/pesciolino%20LaFilosofiaout.gif','Immagini/Barra/stellineChiSiamoout.gif','Immagini/Barra/stellineChiSiamo.gif','Immagini/Barra/serpenteComeLavoriamoout.gif','Immagini/Barra/serpenteComeLavoriamo%20.gif','Immagini/Barra/sole%20Personal%20Photographer%20out.gif','Immagini/Barra/sole%20Personal%20Photographer.gif','Immagini/Barra/luna%20galleriaout.gif','Immagini/Barra/luna%20galleria.gif','Immagini/Barra/Pesce%20linkout.gif','Immagini/Barra/Pesce%20link.gif','Immagini/Barra/Cavalluccio%20linkout.gif','Immagini/Barra/Cavalluccio%20link.gif','Immagini/Barra/topolino%20Contattiout.gif','Immagini/Barra/topolino%20Contatti.gif');">
<div style="position:fixed; z-index:2; top:0; left:0; width:100%; background:#929292; padding:10px 0 10px 0;"><table border="0" bordercolor="#FFFFFF" align="center" cellpadding="0" cellspacing="0" >
  <tr> 
    <td><div align="center"><a href="index.htm" target="_top" onClick="MM_nbGroup('down','group1','Home','Immagini/Barra/coccinella%20linkout.gif',1)" onMouseOver="MM_nbGroup('over','Home','Immagini/Barra/coccinella%20link.gif','Immagini/Barra/coccinella%20linkout.gif',1)" onMouseOut="MM_nbGroup('out')"><img src="Immagini/Barra/coccinella%20.gif" alt="Home" name="Home" width="84" height="57" border="0" onload=""></a></div></td>
    <td><div align="center"><a href="FotografoMatrimonioVenezia.htm" target="_top" onClick="MM_nbGroup('down','group1','ChiSiamo','Immagini/Barra/stellineChiSiamoout.gif',1)" onMouseOver="MM_nbGroup('over','ChiSiamo','Immagini/Barra/stellineChiSiamo.gif','Immagini/Barra/stellineChiSiamoout.gif',1)" onMouseOut="MM_nbGroup('out')"><img src="Immagini/Barra/stelline%20.gif" alt="Chi Siamo" name="ChiSiamo" border="0" onload=""></a></div></td>
    <td><div align="center"><a href="La Filosofia.htm" target="_top" onClick="MM_nbGroup('down','group1','LaFilosofia','Immagini/Barra/pesciolino%20LaFilosofiaout.gif',1)" onMouseOver="MM_nbGroup('over','LaFilosofia','Immagini/Barra/pesciolino%20LaFilosofia.gif','Immagini/Barra/pesciolino%20LaFilosofiaout.gif',1)" onMouseOut="MM_nbGroup('out')"><img src="Immagini/Barra/pesciolino%20.gif" alt="La Filosofia" name="LaFilosofia" width="99" height="57" border="0" onload=""></a></div></td>
    <td><div align="center"><a href="Come Lavoriamo.htm" target="_top" onClick="MM_nbGroup('down','group1','ComeLavoriamo','Immagini/Barra/serpenteComeLavoriamoout.gif',1)" onMouseOver="MM_nbGroup('over','ComeLavoriamo','Immagini/Barra/serpenteComeLavoriamo%20.gif','Immagini/Barra/serpenteComeLavoriamoout.gif',1)" onMouseOut="MM_nbGroup('out')"><img src="Immagini/Barra/serpente%20.gif" alt="Come Lavoriamo" name="ComeLavoriamo" border="0" onload=""></a></div></td>
    <td><div align="center"><a href="Personal Photographer Venice.htm" target="_top" onClick="MM_nbGroup('down','group1','PersonalPhotographer','Immagini/Barra/sole%20Personal%20Photographer%20out.gif',1)" onMouseOver="MM_nbGroup('over','PersonalPhotographer','Immagini/Barra/sole%20Personal%20Photographer.gif','Immagini/Barra/sole%20Personal%20Photographer%20out.gif',1)" onMouseOut="MM_nbGroup('out')"><img src="Immagini/Barra/sole.gif" alt="Personal Photographer" name="PersonalPhotographer" width="89" height="58" border="0" onload=""></a></div></td>
    <td><div align="center"><a href="Galleria.htm" target="_top" onClick="MM_nbGroup('down','group1','Galleria','Immagini/Barra/luna%20galleriaout.gif',1)" onMouseOver="MM_nbGroup('over','Galleria','Immagini/Barra/luna%20galleria.gif','Immagini/Barra/luna%20galleriaout.gif',1)" onMouseOut="MM_nbGroup('out')"><img src="Immagini/Barra/luna%20galleriaout.gif" alt="Galleria" name="Galleria" border="0" onload="MM_nbGroup('init','group1','Galleria','Immagini/Barra/luna%20.gif',1)"></a></div></td>
    <td><div align="center"><a href="Foto Album.htm" target="_top" onClick="MM_nbGroup('down','group1','FotoAlbum','Immagini/Barra/Pesce%20linkout.gif',1)" onMouseOver="MM_nbGroup('over','FotoAlbum','Immagini/Barra/Pesce%20link.gif','Immagini/Barra/Pesce%20linkout.gif',1)" onMouseOut="MM_nbGroup('out')"><img name="FotoAlbum" src="Immagini/Barra/Pesce.gif" border="0" alt="Foto Album" onLoad=""></a></div></td>
	
	<td><div align="center"><font color="#FFFFFF" size="-3"><a href="EventiCongressiVeneziaLido.htm" target="_top" onClick="MM_nbGroup('down','group1','EventiCongressi','Immagini/Barra/Cavalluccio%20linkout.gif',1)" onMouseOver="MM_nbGroup('over','EventiCongressi','Immagini/Barra/Cavalluccio%20link.gif','',1)" onMouseOut="MM_nbGroup('out')"><img name="EventiCongressi" src="Immagini/Barra/Cavalluccio.gif" border="0" alt="Eventi Congressi" onLoad=""></a></font></div></td>
	<td><div align="center"><font color="#FFFFFF" size="-3"><a href="Foto/Stampa/Venezia/Fujifilm.htm" target="_top" onClick="MM_nbGroup('down','group1','Fujifilm','Immagini/Barra/LogoFujifilm2.gif',1)" onMouseOver="MM_nbGroup('over','Fujifilm','Immagini/Barra/LogoFujifilm1.gif','',1)" onMouseOut="MM_nbGroup('out')"><img name="Fujifilm" src="Immagini/Barra/LogoFujifilm.gif" border="0" alt="" onLoad=""></a></font></div></td>
	<td><div align="center"><font color="#FFFFFF" size="-3"><a href="Consigliati.htm" target="_top" onClick="MM_nbGroup('down','group1','Consigli','Immagini/Barra/maialino%20linkout.gif',1)" onMouseOver="MM_nbGroup('over','Consigli','Immagini/Barra/maialino%20link.gif','Immagini/Barra/maialino%20linkout.gif',1)" onMouseOut="MM_nbGroup('out')"><img name="Consigli" src="Immagini/Barra/maialino.gif" border="0" alt="Consigli" onload=""></a></font></div></td>
	<td><div align="center"><font color="#FFFFFF" size="-3"><a href="Contatto.htm" target="_top" onClick="MM_nbGroup('down','group1','Contatti','Immagini/Barra/topolino%20Contattiout.gif',1)" onMouseOver="MM_nbGroup('over','Contatti','Immagini/Barra/topolino%20Contatti.gif','Immagini/Barra/topolino%20Contattiout.gif',1)" onMouseOut="MM_nbGroup('out')"><img src="Immagini/Barra/topolino%20.gif" alt="Contatti" name="Contatti" border="0" onload=""></a></font></div></td>
  </tr>
  <tr>
    <td><div align="center"><font color="#FFFFFF" size="-1" face="Arial, Helvetica, sans-serif">Home</font></div></td>
    <td><div align="center"><font color="#FFFFFF" size="-1" face="Arial, Helvetica, sans-serif">Chi<br>
        Siamo</font></div></td>
    <td><div align="center"><font color="#FFFFFF" size="-1" face="Arial, Helvetica, sans-serif">La<br>
        Filosofia</font></div></td>
    <td><div align="center"><font color="#FFFFFF" size="-1" face="Arial, Helvetica, sans-serif">Come<br> Lavoriamo</font></div></td>
    <td><div align="center"><font color="#FFFFFF" size="-1" face="Arial, Helvetica, sans-serif">Personal<br>Photographer</font></div></td>
    <td><div align="center"><font color="#FFFFFF" size="-1" face="Arial, Helvetica, sans-serif">Galleria</font></div></td>
	<td><div align="center"><font color="#FFFFFF" size="-1" face="Arial, Helvetica, sans-serif">Album</font></div></td>
	<td><div align="center"><font color="#FFFFFF" size="-1" face="Arial, Helvetica, sans-serif">Eventi<br>Congressi</font></div></td>
	<td><div align="center"><font color="#FFFFFF" size="-1" face="Arial, Helvetica, sans-serif">Fujifilm</font></div></td>
    <td><div align="center"><font color="#FFFFFF" size="-1" face="Arial, Helvetica, sans-serif">Links</font></div></td>
	<td><div align="center"><font color="#FFFFFF" size="-1" face="Arial, Helvetica, sans-serif">Contatti</font></div></td>
  </tr>
</table></div>
<div id="contenuto" style="padding:120px 10% 30px 10%;">
	<?php
	$handle = opendir('./Gallery');
	$cartelle=array();
	$numero=0;
    while ($entr = readdir($handle)) {
		if ($entr != "." && $entr != "..") {
			$cartelle[$numero]=$entr;
			$numero++;
		}
    }
    rsort($cartelle, SORT_NUMERIC);
    foreach($cartelle as $entry)
    {
		$dirimm = opendir('./Gallery/'.$entry.'/Mini')or die("Errore #6464 contattare l'assistenza");
			$imm = readdir($dirimm);
			while($imm == "." || $imm=="..") {
				$imm = readdir($dirimm);
			}
			$dirnome = opendir('./Gallery/'.$entry.'/Info')or die("Errore #4636 contattare l'assistenza");
			$nome = readdir($dirnome);
			while($nome !="Nome.txt") {
				$nome = readdir($dirnome);
			}
			$nome=file_get_contents("./Gallery/$entry/Info/$nome");
			?>
			<div class="layout" id="<?echo $entry;?>" onclick="document.getElementById('idalbum').value=this.id;compari('popup'); document.getElementById('pass').focus();"><?
			echo "<img class='album' src='./Gallery/$entry/Mini/$imm' style=''/><center>$nome</center>";?>
			</div><?
	}
	?>
</div>
<div id="popup" class="popup">
            <form action="postgal.php" method="POST">
                <input type="hidden" id="idalbum" name="idalbum" value=""/>
                <div class="trasparenza"></div>
                <div id="d" class="finestraPopup" style="left:30%; top:20%;">
				<div id="handle" style="position:absolute; top:0; right:0; width:100%; height:25px; background:gray;"></div><image id="chiudi" src="closeIcon.png" onclick="scompari('popup');" style="position:absolute; top:2px; right:2px;"/>
                   <script language="javascript">
	var theHandle = document.getElementById("handle");
	var theRoot   = document.getElementById("d");
	var lim=window.innerWidth-250;
	var lima=window.innerHeight-80;
	Drag.init(theHandle, theRoot, -50, lim, -20, lima);
</script>
                   Password:<br/>
                   <input id="pass" type="password" name="password"/><br/>
                   <input type="submit" value="Entra"/>
                </div>
            </form>
        </div>
        <div id="err" class="popup">
                <div class="trasparenza"></div>
                <div id="d1" class="finestraPopup" style="left:30%; top:20%;">
				<div id="handle1" style="position:absolute; top:0; right:0; width:100%; height:25px; background:gray;"></div><image id="chiudi" src="closeIcon.png" onclick="scompari('err');" style="position:absolute; top:2px; right:2px;"/>
                  <script language="javascript">
	var theHandle = document.getElementById("handle1");
	var theRoot   = document.getElementById("d1");
	var lim=window.innerWidth-250;
	var lima=window.innerHeight-80;
	Drag.init(theHandle, theRoot, -50, lim, -20, lima);
</script><p style="color:red">Password Errata.</p>
                </div>
        </div>
<?session_destroy();?>
</body>
</html>
*/ ?>

