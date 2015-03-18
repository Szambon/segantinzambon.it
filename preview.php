<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<? session_start();
if(!isset($_SESSION['album'])){
	$_SESSION['err']=1;
	header('Location:Galleria.php');
}
$album=$_SESSION['album'];
if(!isset($_GET['id'])){
	header('Location:album.php');
}
$curr=$_GET['id'];
$did=file_get_contents("./Gallery/$album/Info/Didascalia.txt");
$nome=file_get_contents("./Gallery/$album/Info/Nome.txt");
$pos = strpos($did, '¦');
$sig= substr($did, $pos+2);
$sig2= substr($did, 0, $pos);
$dirimm = opendir('./Gallery/'.$album.'/Galleria/thumb');
$immagini=array();
$quanti=0;
while($imm=readdir($dirimm)){
	if($imm!="." && $imm!=".."){
		$immagini[$quanti]=$imm;
		$quanti++;
	}
}
if($curr>($quanti-1)){
	header('Location:album.php');
}
if($curr<0){
	header('Location:album.php');
}
$indlarg='./Gallery/'.$album.'/Galleria/large/';
sort($immagini, SORT_STRING);
?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
<meta name="Keywords" content="photography,software,photos,digital darkroom,gallery,image,photographer,adobe,photoshop,lightroom" >
<meta name="generator" content="Adobe Photoshop Lightroom" >
<title><? echo $nome;?></title>
<link rel="stylesheet" type="text/css" media="screen" title="Custom Settings" href="./resources/css/custom.css" >
<link rel="stylesheet" type="text/css" media="screen" title="Custom Settings" href="./resources/css/master.css" >

<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript">
window.AgMode = "publish";
cellRolloverColor="#A1A1A1";
cellColor="#949494";
</script>
<script async type="text/javascript" src="./resources/js/live_update.js">
</script>
<script async type="text/javascript" src="Library/jquery.js">
</script>
<script async type="text/javascript" src="Library/jquery.mobile.custom.min.js">
</script>
<script type="text/javascript">
$( document ).on( "swiperight", function(){
	<? if($curr>0){?>
		window.location.href="preview.php?id=<? echo $curr-1;?>";
	<? }?>
});
$( document ).on( "swipeleft", function(){ 
	<? if(($quanti-1)>$curr){?>
		window.location.href="preview.php?id=<? echo $curr+1;?>";
	<? }?>
});
</script>

<!--[if lt IE 7.]> <script defer type="text/javascript" src="../resources/js/pngfix.js"></script> <![endif]-->
<!--[if gt IE 6]> <link rel="stylesheet" href="../resources/css/ie7.css"></link> <![endif]-->
<!--[if lt IE 7.]> <link rel="stylesheet" href="../resources/css/ie6.css"></link> <![endif]-->
</head>


<body  vocab="http://schema.org/">


<div id="wrapper_large">
  
  
  <div id="sitetitle">
    <h1 onclick="clickTarget( this, 'metadata.siteTitle.value' );" id="metadata.siteTitle.value" class="textColor"><? echo $nome;?></h1>
  </div>
  <div id="collectionHeader">
    <h1 onclick="clickTarget( this, 'metadata.groupTitle.value' );" id="metadata.groupTitle.value" class="textColor"><? echo $sig2;?></h1>
    <p onclick="clickTarget( this, 'metadata.groupDescription.value' );" id="metadata.groupDescription.value" class="textColor"><? echo $sig;?></p>
  </div>



  
  <div id="stage2">
    <div id="previewFull" class="borderTopLeft borderBottomRight" style="min-height:404px";>
      <div id="detailTitle" class="detailText">
        <? echo str_replace('.jpg', '', $immagini[$curr]);?></div>

	  
      <div class="detailNav">
        <ul>
                                    <li class="previous detailText"> <? if($curr>0){?><a class="paginationLinks detailText" href="preview.php?id=<? echo $curr-1;?>">Precedente</a><? }else{?>Precedente<? }?> </li>
                                    <li class="index"> <a href="album.php?pag=<? echo ceil(($curr+1)/15)-1;?>" class="detailLinks detailText">Indice</a> </li>
                          <li class="next"> <? if(($quanti-1)>$curr){?><a class="paginationLinks detailText" href="preview.php?id=<? echo $curr+1;?>">Successivo</a><? }else{?>Successivo<? }?> </li>
                                          </ul>
      </div>

      <? if(($quanti-1)>$curr){?><a class="paginationLinks detailText" href="preview.php?id=<? echo $curr+1;?>"><? }else{?><a href="album.php"><? }?>

      <div style="text-align:center;">
                  
            <div class="inner">
                              <img id="immagine" src="<? echo $indlarg.$immagini[$curr];?>"
                    class="previewFullImage preview"
                    id="previewImage"
                    alt="<? echo str_replace('.jpg', '', $immagini[$curr]);?>"
                                        onclick="var node=parentNode.parentNode.parentNode.parentNode; if( node.click ) { return node.click(); } else { return true; }">
                            </div>
          </div>
        
      </a>
      <div style="clear:both; height:5px"></div>

	  
      <div id="detailCaption" class="detailText">
       <? echo str_replace('.jpg', '', $immagini[$curr]);?></div>
    </div>
  </div>
  <div class="clear">
  </div>


  
  <div id="contact">
          <a href="slog.php"> <span
        class="textColor" id="metadata.contactInfo.value">Esci</span>
          </a>
      </div>
  <div class="clear">
  </div>
</div>
</body>
</html>



