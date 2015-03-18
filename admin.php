<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>

<?
session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
<meta name="Keywords" content="photography,software,photos,digital darkroom,gallery,image,photographer,adobe,photoshop,lightroom" >
<meta name="generator" content="Adobe Photoshop Lightroom" >
<title>Admin</title>
<link rel="stylesheet" type="text/css" media="screen" title="Custom Settings" href="resources/css/custom.css" >
<link rel="stylesheet" type="text/css" media="screen" title="Custom Settings" href="resources/css/master.css" >
<script async type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
	var dragged=false;
	var mouseX=0;
	var mouseY=0;
jQuery(document).ready(function(){
	$('#handle').mousedown(function(){dragged=true;}).mouseup(function(){dragged=false;});
   $(document).mousemove(function(e){
	 
		   var movx=e.pageX-mouseX;
		   var movy=e.pageY-mouseY;
		  
		    if(dragged){
				var lef=$('#d').offset();
		  var to=lef.top;
		  lef=lef.left;
		  $('#d').css({'left':lef+movx+'px', 'top':to+movy+'px'});
	  }
		  mouseX=e.pageX;
		  mouseY=e.pageY;
   }); 
})
</script>
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
	background-color:#949494;
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
</style>

<style>
p{
	float:left;
	font-size:120%;
}
input{
	float:right;
	width:50%;
}
select{
	float:right;
	width:51%;
}
#centro{
	position:absolute;
	width:450px;
	height:200px;
}
</style>
<script>
	function compari(obj)
	{
		$('#'+obj)[0].style.visibility="visible";
	}
	function scompari(obj)
	{
		$('#'+obj)[0].style.visibility="hidden";
	}
	function richiesta(obj){
		if(obj.value!='prova'){
		$.ajax({
type: "POST",
data: {'dove':obj.value, 'cosa':'Nome'},
url: "caricainfo.php",
success: function(msg){
	$('#nome').val(msg);
}
});
	$.ajax({
type: "POST",
data: {'dove':obj.value, 'cosa':'Didascalia'},
url: "caricainfo.php",
success: function(msg){
	$('#did').val(msg);
}
});

	$.ajax({
type: "POST",
data: {'dove':obj.value, 'cosa':'Sigla'},
url: "caricainfo.php",
success: function(msg){
	$('#sigla').val(msg);
}
});
if(obj.value=='Ad'){ 
	$('#nome').attr('readonly', true);
	$('#did').attr('readonly', true);
	$('#sigla').attr('readonly', true);
	$('#nome').css('color', 'gray');
	$('#did').css('color', 'gray');
	$('#sigla').css('color', 'gray');
}
else{
	$('#nome').attr('readonly', false);
	$('#did').attr('readonly', false);
	$('#sigla').attr('readonly', false);
	$('#nome').css('color', 'black');
	$('#did').css('color', 'black');
	$('#sigla').css('color', 'black');
}}
else{
	$('#did').val('');
	$('#sigla').val('');
	$('#nome').val('');
	$('#nome').attr('readonly', true);
	$('#did').attr('readonly', true);
	$('#sigla').attr('readonly', true);
	$('#nome').css('color', 'gray');
	$('#did').css('color', 'gray');
	$('#sigla').css('color', 'gray');
}
}
function aggiorna(){
	$.ajax({
type: "POST",
data: {'password':$('#p').val(), 'fold':$('#f').val(), 'nome':$('#nome').val(),'did':$('#did').val(),'sigla':$('#sigla').val(), 'nuova':$('#nuova').val()},
url: "log.php",
success: function(msg){
	if(msg=='1'){$('#testopop').css('color','red');$('#testopop').html('Permesso negato.');}
	if(msg=='2'){$('#testopop').css('color','white');$('#testopop').html('Effettuato con successo.');}
	if(msg=='3'){$('#testopop').css('color','red');$('#testopop').html('Problemi autorizzazione. Chiama Fabio.');}
	compari('err');
}
});
}
</script>
<script type="text/javascript">
function centra(){
	var larg=450;
	var largf=804;
	var alt=document.getElementById('centro').offsetHeight+20;
	var altf=534;
	document.getElementById('centro').style.top=(altf-alt)/2+'px';
	document.getElementById('centro').style.left=(largf-larg)/2+'px';
}
window.AgMode = "publish";
cellRolloverColor="#A1A1A1";
cellColor="#949494";
</script>
<script async type="text/javascript" src="resources/js/live_update.js">
</script>


<!--[if lt IE 7.]> <script defer type="text/javascript" src="./resources/js/pngfix.js"></script> <![endif]-->
<!--[if gt IE 6]> <link rel="stylesheet" href="./resources/css/ie7.css"></link> <![endif]-->
<!--[if lt IE 7.]> <link rel="stylesheet" href="./resources/css/ie6.css"></link> <![endif]-->
</head>


<body onload=" centra(); <?if(isset($_SESSION['err'])) echo "compari('err');";?>" >

<?
$handle = opendir('./Gallery');
	$cartelle=array();
	$numero=0;
    while ($entr = readdir($handle)) {
		if ($entr != "." && $entr != "..") {
			$cartelle[$numero]=$entr;
			$numero++;
		}
    }
    sort($cartelle, SORT_NUMERIC);
?>
<div id="wrapper_thumb">
  
  
  <div id="sitetitle">
  </div>
  <div id="collectionHeader">
  </div>


  
  <div id="stage">
    <div id="index">
              
		
                                        <div class="emptyThumbnail borderTopLeft" style="width:804px!important; height:534px!important;">
                                        <div id="centro">
                                        <p>Password Amministrazione:</p><input id='p' type="password" name="password"/><br/><br/><p>Cartella:</p><select name="fold" id='f' onchange="richiesta(this)"><option value="prova">-Seleziona Cartella-</option>
                                        <?for($i=0; $i<sizeof($cartelle); $i++){
											?><option value="<?echo $cartelle[$i];?>"><?echo $cartelle[$i];?></option><?}?>
											<option value="Ad">Ad</option>
                                        </select><br/><br/><p>Imposta Password:</p><input id='nuova' type="password" name="nuova"/><br/><br/><span id="Info"><p>Nome:</p><input id="nome" type="text" name="nome"/><br/><br/><p>Didascalia:</p><input id="did" type="text" name="did"/><br/><br/><p>Sigla:</p><input id="sigla" type="text" name="sigla"/><br/><br/></span><input type="button" value="Invia" style="width:20%!important;"onclick="aggiorna()"/></center></form></div>
                                        </div>
  </div>
  <div class="clear">
  </div>
  <div class="clear">
  </div>
</div>
<div id="err" class="popup">
                <div class="trasparenza"></div>
                <div id="d" class="finestraPopup" style="left:30%; top:20%;">
				<div id="handle" style="position:absolute; top:0; right:0; width:100%; height:25px; background:gray; cursor:move !important;"></div><image id="chiudi" src="closeIcon.png" onclick="scompari('err');" style="position:absolute; top:2px; right:2px;"/>
				<p id="testopop"></p>
                </div>
        </div>
        <?session_destroy();?>
</body>
</html>

