<? 
include '../Slider_Template.php';
$images = loadImages('../Galleria/Albums/DanieleNastinka/images');
$menu = '<div id="mobile_menu" class="mobile_Navigation">
        <a href="../">Home</a> &raquo;
		<a href="Galleria.htm">Galleria</a> &raquo;
        <span>FotoAlbum</span>
        <a id="nav-toggle" href="#"><span>&#x2261;</span></a>
        <span class="clear"></span>
    </div>
<div id="menu" >
			<ul>
				<li><a href="/">Home</a></li>
				<li><a href="/IT/FotografoMatrimonioVenezia.htm"> Chi siamo</a></li>
				<li><a href="/IT/FAQ.html">FAQ</a></li>
				<li><a href="/IT/PersonalPhotographerVenice.htm">Personal Photographer</a></li>
				<li><a href="/IT/Galleria.htm">Galleria</a></li>
				<li><a href="/IT/FotoAlbum.htm">Album</a></li>
				<li><a href="/IT/EventiCongressiVeneziaLido.htm">Eventi Congressi</a></li>
				<li><a href="/IT/Fujifilm.htm">Fujifilm</a></li>
				<li><a href="/IT/Consigliati.htm">Links</a></li>
				<li><a href="/IT/PrezziServizioMatrimonialeVenezia.htm">Prezzi</a></li>
				<li><a href="/IT/Contatto.htm">Contatti</a></li>
			</ul>
		</div>

<div xmlns:v="http://rdf.data-vocabulary.org/#" id="bread_crumbs" class="PC_Navigation">
			<span typeof="v:Breadcrumb"><a href="../" rel="v:url" property="v:title">Home</a> &raquo;</span>
		<span typeof="v:Breadcrumb"><a href="Galleria.htm" rel="v:url" property="v:title">Galleria</a></span> &raquo;
        <span typeof="v:Breadcrumb"><span href="." rel="v:url" property="v:title">FotoAlbum</span></span>
		<div class="related_images_dx"><label for="language_picker">Language: </label><div class="dropdown dropdown-dark"><select id="language_picker" class="dropdown-select"><option value="IT" selected>IT</option><option value="EN">EN</option></select></div></div>
</div>';
setUpSlideShow($images, 'it', 'Foto di FotoAlbum', '', $menu );
?>