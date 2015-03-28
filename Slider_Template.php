<?php

function loadImages($location){
	$dirimm = opendir($location)or die("Error loading Failed.");
	$immagini=array();
	$quanti=0;
	while($imm=readdir($dirimm)){
		if($imm!="." && $imm!=".."){
			array_push ( $immagini, $location."/".$imm);
		}
	}
	sort($immagini, SORT_NATURAL | SORT_FLAG_CASE);
	return $immagini;
}

function setUpSlideShow($img_array, $lang, $title, $desc, $menu){
?>
<!DOCTYPE html>
<html lang="<? echo $lang;?>">
<head>
<title><? echo $title;?></title>

<link rel="icon" type="image/x-icon"  href="../images/faricon1.ico"/>
<link href="../CSS/Stile2.css" rel="stylesheet" type="text/css"/>
<style type="text/css">
body{
	background:#333;
}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="<? echo $desc;?>" />
<meta name="keywords" content="matrimonio venezia, foto matrimonio venezia, matrimonio foto venezia, fotografo matrimonio venezia, fotografo venezia, servizio fotografico matrimoniale, servizio fotografico venezia, sposi venezia, nozze, cerimonia, cerimonia civile, servizio fotografico, fotografo venezia,  matrimonio, foto sposi, sposi a venezia, matrimonio fotografo a venezia, foto matrimonio padova, fotografo matrimonio padova, foto matrimonio verona, fotografo matrimonio verona, foto matrimonio treviso, fotografo matrimonio treviso, sposarsi a venezia, sposarsi a treviso, sposarsi a verona, wedding photo treviso, wedding photographer treviso, wedding photo verona,fotomatrimonio lago di garda, fotografo matrimonio lago di garda, wedding photographer verona, wedding photo padova, wedding photographer padova, fotografi venezia, venezia, veneto, foto matrimonio, album, fotoalbum, minilab frontier, fuji, foto digitale">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../CSS/Stile2Mobile.css" media="(max-width: 750px)" rel="stylesheet" type="text/css" />
<link href="../CSS/Slider.css" rel="stylesheet" type="text/css"/>



<script src="../Library/jquery.js"></script>
<script src="../Library/jssor.slider.mini.js"></script>
<script src="../js/mobilenav.js" type="text/javascript"></script>
<script src="/js/LanguageChange.js"></script>
<script src="../js/Slider.js">
</script>
</head>
<body  vocab="http://schema.org/">
<span id="cover"></span>
<? echo $menu;?>
<div id="container">
    <div id="slider1_container" style="position:relative; width:800px; height: 600px;">
        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                    background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
                </div>
                <div style="position: absolute; display: block; background: url(../CSS/spinner_squares_circle.gif) no-repeat center center;
                    top: 0px; left: 0px;width: 100%;height:100%;">
                </div>
        </div>
        <!-- Slides Container -->
        <div u="slides" style="position: relative; overflow: hidden; left: 0px; top: 0px; width: 800px; height: 600px;">
            	<?
					foreach($img_array as $image){
						?>
                        <div>
                            <img u="image" src="<? echo $image;?>" />
                            <div u="thumb">
                                <div style="width: 100%; height: 100%; background-image: url(<? echo $image;?>); background-size: contain; background-repeat:no-repeat; background-position:center;"></div>
                            </div>
                        </div>
                        <?
					}
				?>
        </div>
         <!-- Arrow Navigator Skin Begin -->
            
            <!-- Arrow Left -->
            <span u="arrowleft" class="jssora05l" style="width: 40px; height: 40px; top: 123px; left: 8px;">
            </span>
            <!-- Arrow Right -->
            <span u="arrowright" class="jssora05r" style="width: 40px; height: 40px; top: 123px; right: 8px">
            </span>
            <!-- Arrow Navigator Skin End -->
        <!-- Thumbnail Navigator Skin Begin -->
        <div u="thumbnavigator" class="jssort01" style="position: absolute; width: 800px; height: 100px; left:0px; bottom: -100px;">
        
            <!-- Thumbnail Item Skin Begin -->
            <div u="slides" style="cursor: move;">
                <div u="prototype" class="p" style="position: absolute; width: 72px; height: 72px; top: 0; left: 0;">
                    <div class=w><thumbnailtemplate style="width: 100%; height: 100%; border: none;position:absolute; top: 0; left: 0;"></thumbnailtemplate></div>
                    <div class=c>
                    </div>
                </div>
            </div>
			
            <!-- Thumbnail Item Skin End -->
        </div>
        <!-- Thumbnail Navigator Skin End -->
		<div u="any" id="play_button" style="position: absolute; left:0px; bottom: -150px; left:380px">
		</div>
	</div>
</div>
</body>
</html>
<?
}
?>