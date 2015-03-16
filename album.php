<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>

<? session_start();
$location = $_SESSION['lang'];
if(!$location)
{
	$location = "IT";
}
if(!isset($_SESSION['album'])){
	$_SESSION['err']=1;
	if($location == "EN")
	{
		header('Location: /EN/Gallery.htm');
	}
	else{
		header('Location: /IT/Galleria.htm');
	}
}
switch($location)
{
	case "EN":
		$precedente = "Previous";
		$successivo = "Next";
		$esci = "Exit";
		break;
	case "IT":
	default:
		$precedente = "Precendete";
		$successivo = "Successivo";
		$esci = "Esci";
		break;
}

require('DBConnect.php');
$album=$_SESSION['album'];
$result = $dbConnection->prepare("SELECT * FROM PrivateAlbums WHERE Cartella = :album", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$result->execute(array(':album' => $album));
$result = $result->fetch();
function serve($image_id) {
	$actual_path_to_image='./Gallery/'.$album.'/Galleria/thumb'.$image_id;
  header('Content-Type: image/jpeg');
  echo(file_get_contents($actual_path_to_image));
} 
if(!isset($_GET['pag']))$pag=0;
else $pag=$_GET['pag'];
$nome=$result['Nome'];
$sig= $result['Sigla'];
$sig2= $result['Didascalia'];
$dirimm = opendir('./Gallery/'.$album.'/Galleria/thumb')or die("Errore di caricamento contatta l'amministratore.");
$immagini=array();
$quanti=0;
while($imm=readdir($dirimm)){
	if($imm!="." && $imm!=".."){
		$immagini[$quanti]=$imm;
		$quanti++;
	}
}
$pagmax=ceil($quanti/15);
if($pag>($pagmax-1)){
	$pag=$pagmax-1;
}
$indimm='./Gallery/'.$album.'/Galleria/thumb/';
sort($immagini, SORT_STRING);
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
<meta name="Keywords" content="photography,software,photos,digital darkroom,gallery,image,photographer,adobe,photoshop,lightroom" >
<meta name="generator" content="Adobe Photoshop Lightroom" >
<title><? echo $nome?></title>
<link rel="stylesheet" type="text/css" media="screen" title="Custom Settings" href="resources/css/custom.css" >
<link rel="stylesheet" type="text/css" media="screen" title="Custom Settings" href="resources/css/master.css" >

<script type="text/javascript">
window.AgMode = "publish";
cellRolloverColor="#A1A1A1";
cellColor="#949494";
</script>
<script async type="text/javascript" src="resources/js/live_update.js">
</script>
<script async type="text/javascript" src="resources/js/jquery.js">
</script>
<!--[if lt IE 7.]> <script defer type="text/javascript" src="./resources/js/pngfix.js"></script> <![endif]-->
<!--[if gt IE 6]> <link rel="stylesheet" href="./resources/css/ie7.css"></link> <![endif]-->
<!--[if lt IE 7.]> <link rel="stylesheet" href="./resources/css/ie6.css"></link> <![endif]-->
</head>


<body>


<div id="wrapper_thumb">
  
  
  <div id="sitetitle">
    <h1 onclick="clickTarget( this, 'metadata.siteTitle.value' );" id="metadata.siteTitle.value" class="textColor"><? echo $nome;?></h1>
  </div>
  <div id="collectionHeader">
    <h1 onclick="clickTarget( this, 'metadata.groupTitle.value' );" id="metadata.groupTitle.value" class="textColor"><? echo $sig2;?></h1>
    <p onclick="clickTarget( this, 'metadata.groupDescription.value' );" id="metadata.groupDescription.value" class="textColor"><? echo $sig;?></p>
  </div>


  
  <div id="stage">
    <div id="index">
              
		
                                        <? if((($pag*15)+1)>$quanti){?><div class="emptyThumbnail borderTopLeft"></div><? }else{?><div class="thumbnail borderTopLeft" onmouseover="window.gridOn( this.parentNode, 'ID2A396E0C-163A-4485-B3F9-BF81073E0DC4_thumb' );" onmouseout="window.gridOff( this.parentNode );" onclick="window.location.href='preview.php?id=<? echo ($pag*15);?>'">
            <div class="itemNumber"><? echo ($pag*15)+1;?></div>
            <a href="preview.php?id=<? echo ($pag*15);?>" onclick="return needThumbImgLink;">
            <div style="
            <? 
            list($width, $height) = getimagesize("./Gallery/$album/Galleria/thumb/".$immagini[($pag*15)]);
            echo "margin-left:".(161-$width)/2 ."px;"; echo "margin-top:".(161-$height)/2 ."px;";
            ?>">
                            <div class="dropShadow">
                <div class="inner">
                                    <img src="<? echo $indimm.$immagini[($pag*15)];?>" id="ID2A396E0C-163A-4485-B3F9-BF81073E0DC4_thumb" alt="" class="thumb" />
                                  </div>
              </div>
                          </div>
            </a> </div><? }?>
                  <? if((($pag*15)+2)>$quanti){?><div class="emptyThumbnail borderTopLeft"></div><? }else{?><div class="thumbnail borderTopLeft" onmouseover="window.gridOn( this.parentNode, 'ID0CF54B2B-4F45-4826-869E-4F8273C1698A_thumb' );" onmouseout="window.gridOff( this.parentNode );" onclick="window.location.href='preview.php?id=<? echo($pag*15)+1;?>'">
            <div class="itemNumber"><? echo ($pag*15)+2;?></div>
            <a href="preview.php?id=<? echo($pag*15)+1;?>" onclick="return needThumbImgLink;">
            <div style="
            <? 
            list($width, $height) = getimagesize("./Gallery/$album/Galleria/thumb/".$immagini[($pag*15)+1]);
            echo "margin-left:".(161-$width)/2 ."px;"; echo "margin-top:".(161-$height)/2 ."px;";
            ?>">
                            <div class="dropShadow">
                <div class="inner">
                                    <img src="<? echo $indimm.$immagini[($pag*15)+1];?>" id="ID0CF54B2B-4F45-4826-869E-4F8273C1698A_thumb" alt="" class="thumb" />
                                  </div>
              </div>
                          </div>
            </a> </div><? }?>
                  <? if((($pag*15)+3)>$quanti){?><div class="emptyThumbnail borderTopLeft"></div><? }else{?><div class="thumbnail borderTopLeft" onmouseover="window.gridOn( this.parentNode, 'ID89018861-3128-4207-A63B-17572719681B_thumb' );" onmouseout="window.gridOff( this.parentNode );" onclick="window.location.href='preview.php?id=<? echo($pag*15)+2;?>'">
            <div class="itemNumber"><? echo ($pag*15)+3;?></div>
            <a href="preview.php?id=<? echo($pag*15)+2;?>" onclick="return needThumbImgLink;">
            <div style="
            <? 
            list($width, $height) = getimagesize("./Gallery/$album/Galleria/thumb/".$immagini[($pag*15)+2]);
            echo "margin-left:".(161-$width)/2 ."px;"; echo "margin-top:".(161-$height)/2 ."px;";
            ?>">
                            <div class="dropShadow">
                <div class="inner">
                                    <img src="<? echo $indimm.$immagini[($pag*15)+2];?>" id="ID89018861-3128-4207-A63B-17572719681B_thumb" alt="" class="thumb" />
                                  </div>
              </div>
                          </div>
            </a> </div><? }?>
                  <? if((($pag*15)+4)>$quanti){?><div class="emptyThumbnail borderTopLeft"></div><? }else{?><div class="thumbnail borderTopLeft" onmouseover="window.gridOn( this.parentNode, 'ID1850CEC8-F7BE-463E-9E55-5CB128F320A7_thumb' );" onmouseout="window.gridOff( this.parentNode );" onclick="window.location.href='preview.php?id=<? echo($pag*15)+3;?>'">
            <div class="itemNumber"><? echo ($pag*15)+4;?></div>
            <a href="preview.php?id=<? echo($pag*15)+3;?>" onclick="return needThumbImgLink;">
            <div style="
            <? 
            list($width, $height) = getimagesize("./Gallery/$album/Galleria/thumb/".$immagini[($pag*15)+3]);
            echo "margin-left:".(161-$width)/2 ."px;"; echo "margin-top:".(161-$height)/2 ."px;";
            ?>">
                            <div class="dropShadow">
                <div class="inner">
                                    <img src="<? echo $indimm.$immagini[($pag*15)+3];?>" id="ID1850CEC8-F7BE-463E-9E55-5CB128F320A7_thumb" alt="" class="thumb" />
                                  </div>
              </div>
                          </div>
            </a> </div><? }?>
                  <? if((($pag*15)+5)>$quanti){?><div class="emptyThumbnail borderTopLeft  borderRight"></div><? }else{?><div class="thumbnail borderTopLeft borderRight" onmouseover="window.gridOn( this.parentNode, 'ID29040068-10B4-45CE-8819-120B18A06D95_thumb' );" onmouseout="window.gridOff( this.parentNode );" onclick="window.location.href='preview.php?id=<? echo($pag*15)+4;?>'">
            <div class="itemNumber"><? echo ($pag*15)+5;?></div>
            <a href="preview.php?id=<? echo($pag*15)+4;?>" onclick="return needThumbImgLink;">
            <div style="
            <? 
            list($width, $height) = getimagesize("./Gallery/$album/Galleria/thumb/".$immagini[($pag*15)+4]);
            echo "margin-left:".(161-$width)/2 ."px;"; echo "margin-top:".(161-$height)/2 ."px;";
            ?>">
                            <div class="dropShadow">
                <div class="inner">
                                    <img src="<? echo $indimm.$immagini[($pag*15)+4];?>" id="ID29040068-10B4-45CE-8819-120B18A06D95_thumb" alt="" class="thumb" />
                                  </div>
              </div>
                          </div>
            </a> </div><? }?>
                  <div class="clear">
          </div>
                  <? if((($pag*15)+6)>$quanti){?><div class="emptyThumbnail borderTopLeft"></div><? }else{?><div class="thumbnail borderTopLeft" onmouseover="window.gridOn( this.parentNode, 'ID22E40694-D22D-4E61-BD2C-330D02F95902_thumb' );" onmouseout="window.gridOff( this.parentNode );" onclick="window.location.href='preview.php?id=<? echo($pag*15)+5;?>'">
            <div class="itemNumber"><? echo ($pag*15)+6;?></div>
            <a href="preview.php?id=<? echo($pag*15)+5;?>" onclick="return needThumbImgLink;">
            <div style="
            <? 
            list($width, $height) = getimagesize("./Gallery/$album/Galleria/thumb/".$immagini[($pag*15)+5]);
            echo "margin-left:".(161-$width)/2 ."px;"; echo "margin-top:".(161-$height)/2 ."px;";
            ?>">
                            <div class="dropShadow">
                <div class="inner">
                                    <img src="<? echo $indimm.$immagini[($pag*15)+5];?>" id="ID22E40694-D22D-4E61-BD2C-330D02F95902_thumb" alt="" class="thumb" />
                                  </div>
              </div>
                          </div>
            </a> </div><? }?>
                  <? if((($pag*15)+7)>$quanti){?><div class="emptyThumbnail borderTopLeft"></div><? }else{?><div class="thumbnail borderTopLeft" onmouseover="window.gridOn( this.parentNode, 'ID289402D5-45FA-4BB2-BBCE-5E9432277078_thumb' );" onmouseout="window.gridOff( this.parentNode );" onclick="window.location.href='preview.php?id=<? echo($pag*15)+6;?>'">
            <div class="itemNumber"><? echo ($pag*15)+7;?></div>
            <a href="preview.php?id=<? echo($pag*15)+6;?>" onclick="return needThumbImgLink;">
            <div style="
            <? 
            list($width, $height) = getimagesize("./Gallery/$album/Galleria/thumb/".$immagini[($pag*15)+6]);
            echo "margin-left:".(161-$width)/2 ."px;"; echo "margin-top:".(161-$height)/2 ."px;";
            ?>">
                            <div class="dropShadow">
                <div class="inner">
                                    <img src="<? echo $indimm.$immagini[($pag*15)+6];?>" id="ID289402D5-45FA-4BB2-BBCE-5E9432277078_thumb" alt="" class="thumb" />
                                  </div>
              </div>
                          </div>
            </a> </div><? }?>
                  <? if((($pag*15)+8)>$quanti){?><div class="emptyThumbnail borderTopLeft"></div><? }else{?><div class="thumbnail borderTopLeft" onmouseover="window.gridOn( this.parentNode, 'ID65308B56-64AD-4763-A657-78D9504D9CA9_thumb' );" onmouseout="window.gridOff( this.parentNode );" onclick="window.location.href='preview.php?id=<? echo($pag*15)+7;?>'">
            <div class="itemNumber"><? echo ($pag*15)+8;?></div>
            <a href="preview.php?id=<? echo($pag*15)+7;?>" onclick="return needThumbImgLink;">
            <div style="
            <? 
            list($width, $height) = getimagesize("./Gallery/$album/Galleria/thumb/".$immagini[($pag*15)+7]);
            echo "margin-left:".(161-$width)/2 ."px;"; echo "margin-top:".(161-$height)/2 ."px;";
            ?>">
                            <div class="dropShadow">
                <div class="inner">
                                    <img src="<? echo $indimm.$immagini[($pag*15)+7];?>" id="ID65308B56-64AD-4763-A657-78D9504D9CA9_thumb" alt="" class="thumb" />
                                  </div>
              </div>
                          </div>
            </a> </div><? }?>
                  <? if((($pag*15)+9)>$quanti){?><div class="emptyThumbnail borderTopLeft"></div><? }else{?><div class="thumbnail borderTopLeft" onmouseover="window.gridOn( this.parentNode, 'ID924BC7FD-26D9-4582-8C1B-679EED39D3C0_thumb' );" onmouseout="window.gridOff( this.parentNode );" onclick="window.location.href='preview.php?id=<? echo($pag*15)+8;?>'">
            <div class="itemNumber"><? echo ($pag*15)+9;?></div>
            <a href="preview.php?id=<? echo($pag*15)+8;?>" onclick="return needThumbImgLink;">
            <div style="
            <? 
            list($width, $height) = getimagesize("./Gallery/$album/Galleria/thumb/".$immagini[($pag*15)+8]);
            echo "margin-left:".(161-$width)/2 ."px;"; echo "margin-top:".(161-$height)/2 ."px;";
            ?>">
                            <div class="dropShadow">
                <div class="inner">
                                    <img src="<? echo $indimm.$immagini[($pag*15)+8];?>" id="ID924BC7FD-26D9-4582-8C1B-679EED39D3C0_thumb" alt="" class="thumb" />
                                  </div>
              </div>
                          </div>
            </a> </div><? }?>
                  <? if((($pag*15)+10)>$quanti){?><div class="emptyThumbnail borderTopLeft  borderRight"></div><? }else{?><div class="thumbnail borderTopLeft borderRight" onmouseover="window.gridOn( this.parentNode, 'IDD4763830-F480-4D15-9196-BD105CEA0A92_thumb' );" onmouseout="window.gridOff( this.parentNode );" onclick="window.location.href='preview.php?id=<? echo($pag*15)+9;?>'">
            <div class="itemNumber"><? echo ($pag*15)+10;?></div>
            <a href="preview.php?id=<? echo($pag*15)+9;?>" onclick="return needThumbImgLink;">
            <div style="
            <? 
            list($width, $height) = getimagesize("./Gallery/$album/Galleria/thumb/".$immagini[($pag*15)+9]);
            echo "margin-left:".(161-$width)/2 ."px;"; echo "margin-top:".(161-$height)/2 ."px;";
            ?>">
                            <div class="dropShadow">
                <div class="inner">
                                    <img src="<? echo $indimm.$immagini[($pag*15)+9];?>" id="IDD4763830-F480-4D15-9196-BD105CEA0A92_thumb" alt="" class="thumb" />
                                  </div>
              </div>
                          </div>
            </a> </div><? }?>
                  <div class="clear">
          </div>
                  <? if((($pag*15)+11)>$quanti){?><div class="emptyThumbnail borderTopLeft borderBottom"></div><? }else{?><div class="thumbnail borderTopLeft borderBottom" onmouseover="window.gridOn( this.parentNode, 'ID02A3BA64-E653-4CE9-8C5C-56C36DC1F425_thumb' );" onmouseout="window.gridOff( this.parentNode );" onclick="window.location.href='preview.php?id=<? echo($pag*15)+10;?>'">
            <div class="itemNumber"><? echo ($pag*15)+11;?></div>
            <a href="preview.php?id=<? echo($pag*15)+10;?>" onclick="return needThumbImgLink;">
            <div style="
            <? 
            list($width, $height) = getimagesize("./Gallery/$album/Galleria/thumb/".$immagini[($pag*15)+10]);
            echo "margin-left:".(161-$width)/2 ."px;"; echo "margin-top:".(161-$height)/2 ."px;";
            ?>">
                            <div class="dropShadow">
                <div class="inner">
                                    <img src="<? echo $indimm.$immagini[($pag*15)+10];?>" id="ID02A3BA64-E653-4CE9-8C5C-56C36DC1F425_thumb" alt="" class="thumb" />
                                  </div>
              </div>
                          </div>
            </a> </div><? }?>
                  <? if((($pag*15)+12)>$quanti){?><div class="emptyThumbnail borderTopLeft borderBottom"></div><? }else{?><div class="thumbnail borderTopLeft borderBottom" onmouseover="window.gridOn( this.parentNode, 'IDEC5495F3-0F47-4174-9632-A29C6783BACA_thumb' );" onmouseout="window.gridOff( this.parentNode );" onclick="window.location.href='preview.php?id=<? echo($pag*15)+11;?>'">
            <div class="itemNumber"><? echo ($pag*15)+12;?></div>
            <a href="preview.php?id=<? echo($pag*15)+11;?>" onclick="return needThumbImgLink;">
            <div style="
            <? 
            list($width, $height) = getimagesize("./Gallery/$album/Galleria/thumb/".$immagini[($pag*15)+11]);
            echo "margin-left:".(161-$width)/2 ."px;"; echo "margin-top:".(161-$height)/2 ."px;";
            ?>">
                            <div class="dropShadow">
                <div class="inner">
                                    <img src="<? echo $indimm.$immagini[($pag*15)+11];?>" id="IDEC5495F3-0F47-4174-9632-A29C6783BACA_thumb" alt="" class="thumb" />
                                  </div>
              </div>
                          </div>
            </a> </div><? }?>
                  <? if((($pag*15)+13)>$quanti){?><div class="emptyThumbnail borderTopLeft borderBottom"></div><? }else{?><div class="thumbnail borderTopLeft borderBottom" onmouseover="window.gridOn( this.parentNode, 'ID51ACFE09-020E-4350-865D-2279A709DD36_thumb' );" onmouseout="window.gridOff( this.parentNode );" onclick="window.location.href='preview.php?id=<? echo($pag*15)+12;?>'">
            <div class="itemNumber"><? echo ($pag*15)+13;?></div>
            <a href="preview.php?id=<? echo($pag*15)+12;?>" onclick="return needThumbImgLink;">
            <div style="
            <? 
            list($width, $height) = getimagesize("./Gallery/$album/Galleria/thumb/".$immagini[($pag*15)+12]);
            echo "margin-left:".(161-$width)/2 ."px;"; echo "margin-top:".(161-$height)/2 ."px;";
            ?>">
                            <div class="dropShadow">
                <div class="inner">
                                    <img src="<? echo $indimm.$immagini[($pag*15)+12];?>" id="ID51ACFE09-020E-4350-865D-2279A709DD36_thumb" alt="" class="thumb" />
                                  </div>
              </div>
                          </div>
            </a> </div><? }?>
                  <? if((($pag*15)+14)>$quanti){?><div class="emptyThumbnail borderTopLeft borderBottom"></div><? }else{?><div class="thumbnail borderTopLeft borderBottom" onmouseover="window.gridOn( this.parentNode, 'ID12A2020D-C3F6-44B5-9437-37BFA5D47581_thumb' );" onmouseout="window.gridOff( this.parentNode );" onclick="window.location.href='preview.php?id=<? echo($pag*15)+13;?>'">
            <div class="itemNumber"><? echo ($pag*15)+14;?></div>
            <a href="preview.php?id=<? echo($pag*15)+13;?>" onclick="return needThumbImgLink;">
            <div style="
            <? 
            list($width, $height) = getimagesize("./Gallery/$album/Galleria/thumb/".$immagini[($pag*15)+13]);
            echo "margin-left:".(161-$width)/2 ."px;"; echo "margin-top:".(161-$height)/2 ."px;";
            ?>">
                            <div class="dropShadow">
                <div class="inner">
                                    <img src="<? echo $indimm.$immagini[($pag*15)+13];?>" id="ID12A2020D-C3F6-44B5-9437-37BFA5D47581_thumb" alt="" class="thumb" />
                                  </div>
              </div>
                          </div>
            </a> </div><? }?>
            <? if((($pag*15)+15)>$quanti){?><div class="emptyThumbnail borderTopLeft  borderRight borderBottom"></div><? }else{?>      <div class="thumbnail borderTopLeft borderRight borderBottom" onmouseover="window.gridOn( this.parentNode, 'ID1F5E9EFD-B6E2-4EF2-AC5B-055EBC775627_thumb' );" onmouseout="window.gridOff( this.parentNode );" onclick="window.location.href='preview.php?id=<? echo($pag*15)+14;?>'">
            <div class="itemNumber"><? echo ($pag*15)+15;?></div>
            <a href="preview.php?id=<? echo($pag*15)+14;?>" onclick="return needThumbImgLink;">
            <div style="
            <? 
            list($width, $height) = getimagesize("./Gallery/$album/Galleria/thumb/".$immagini[($pag*15)+14]);
            echo "margin-left:".(161-$width)/2 ."px;"; echo "margin-top:".(161-$height)/2 ."px;";
            ?>">
                            <div class="dropShadow">
                <div class="inner">
                                    <img src="<? echo $indimm.$immagini[($pag*15)+14];?>" id="ID1F5E9EFD-B6E2-4EF2-AC5B-055EBC775627_thumb" alt="" class="thumb" />
                                  </div>
              </div>
                          </div>
            </a> </div>
                  <div class="clear">
          </div>
            </div><? }?>
  </div>
  <div class="clear">
  </div>
  
  <div class="pagination">
    <ul>
				  <? if($pag-5>=0){?><li class="textColor"> <a href="album.php?pag=<? echo $pag-5;?>"><? echo $pag-4;?></a> </li><? }?>
                  <? if($pag-4>=0){?><li class="textColor"> <a href="album.php?pag=<? echo $pag-4;?>"><? echo $pag-3;?></a> </li><? }?>
                  <? if($pag-3>=0){?><li class="textColor"> <a href="album.php?pag=<? echo $pag-3;?>"><? echo $pag-2;?></a> </li><? }?>
                  <? if($pag-2>=0){?><li class="textColor"> <a href="album.php?pag=<? echo $pag-2;?>"><? echo $pag-1;?></a> </li><? }?>
                  <? if($pag-1>=0){?><li class="textColor"> <a href="album.php?pag=<? echo $pag-1;?>"><? echo $pag;?></a> </li><? }?>
                        <li class="current textColor"><? echo $pag+1;?></li>
                  <? if($pag+1<$pagmax){?><li class="textColor"> <a href="album.php?pag=<? echo $pag+1;?>"><? echo $pag+2;?></a> </li><? }?>
                  <? if($pag+2<$pagmax){?><li class="textColor"> <a href="album.php?pag=<? echo $pag+2;?>"><? echo $pag+3;?></a> </li><? }?>
                  <? if($pag+3<$pagmax){?><li class="textColor"> <a href="album.php?pag=<? echo $pag+3;?>"><? echo $pag+4;?></a> </li><? }?>
                  <? if($pag+4<$pagmax){?><li class="textColor"> <a href="album.php?pag=<? echo $pag+4;?>"><? echo $pag+5;?></a> </li><? }?>
                  <? if($pag+5<$pagmax){?><li class="textColor"> <a href="album.php?pag=<? echo $pag+5;?>"><? echo $pag+6;?></a> </li><? }?>
                			      <li class="previous textColor"><? if($pag-1>=0){?> <a class="paginationLinks" href="album.php?pag=<? echo $pag-1;?>"><? echo $precedente;?></a><? }else{ echo $precedente; }?> </li>
							      <li class="next textColor"> <? if($pag+1<$pagmax){?><a class="paginationLinks" href="album.php?pag=<? echo $pag+1;?>"><? echo $successivo;?></a><? }else{echo $successivo; }?> </li>
				          </ul>
  </div>

  
  <div id="contact">
          <a href="slog.php?lang=<? echo $location;?>"> <span
        class="textColor" id="metadata.contactInfo.value"><? echo $esci;?></span>
          </a>
      </div>
  <div class="clear">
  </div>
</div>
</body>
</html>





