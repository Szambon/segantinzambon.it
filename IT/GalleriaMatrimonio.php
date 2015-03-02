<? 
include '../Slider_Template.php';
$images = loadImages('../Galleria/GalleriaMatrimonio/images/large');
$menu = '<div id="mobile_menu" class="mobile_Navigation">
        <a href="../">Home</a> &raquo;

        <span>Galleria Matrimonio</span>
        <a id="nav-toggle" href="#"><span>&#x2261;</span></a>
        <span class="clear"></span>
    </div>
<div id="menu" >
	<ul>
    	<li><a href="../">Home</a></li>
    	<li><a href="FotografoMatrimonioVenezia.htm"> Chi siamo</a></li>
    	<li><a href="FAQ.html">FAQ</a></li>
    	<li><a href="PersonalPhotographerVenice.htm">Personal Photographer</a></li>
    	<li><a href="Galleria.htm">Galleria</a></li>
    	<li><a href="FotoAlbum.htm">Album</a></li>
    	<li><a href="EventiCongressiVeneziaLido.htm">Eventi Congressi</a></li>
    	<li><a href="Fujifilm.htm">Fujifilm</a></li>
    	<li><a href="Consigliati.htm">Links</a></li>
    	<li><a href="PrezziServizioMatrimonialeVenezia.htm">Prezzi</a></li>
    	<li><a href="Contatto.htm">Contatti</a></li>
    </ul>
</div>

<div id="bread_crumbs" class="PC_Navigation">
    <a href="../">Home</a> &raquo;
		<a href="Galleria.htm">Galleria</a> &raquo;
        <span>Matrimonio</span>
</div>';
setUpSlideShow($images, 'it', 'Foto di Matrimonio', '', $menu );
?>