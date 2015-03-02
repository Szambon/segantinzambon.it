<? 
include '../Slider_Template.php';
$images = loadImages('../Galleria/Albums/Nicola_Alice_Gabriel/images');
$menu = '<div id="mobile_menu" class="mobile_Navigation">
        <a href="../">Home</a> &raquo;

        <span>Album</span>
        <a id="nav-toggle" href="#"><span>&#x2261;</span></a>
        <span class="clear"></span>
    </div>
<div id="menu" >
	<ul>
    	<li ><a href="../">Home</a></li>
    	<li><a href="About_us.htm">About us</a></li>
    	<li><a href="FAQ_EN.html">FAQ</a></li>
    	<li><a href="PersonalPhotographerVenice_EN.htm">Personal Photographer</a></li>
    	<li><a href="Gallery.htm">Gallery</a></li>
    	<li><a href="PhotoAlbum.htm">Album</a></li>
    	<li><a href="Events_meetings_conferences.htm">Events, meetings and conferences</a></li>
    	<li><a href="Fujifilm_EN.htm">Fujifilm</a></li>
    	<li><a href="Links.htm">Links</a></li>
    	<li><a href="Prices.htm">Prices</a></li>
    	<li><a href="Contact_us.htm">Contact us</a></li>
    </ul>
</div>

<div id="bread_crumbs" class="PC_Navigation">
    <a href="../">Home</a> &raquo;
		<a href="PhotoAlbum.htm">Album</a> &raquo;
        <span>Photo Album</span>
</div>';
setUpSlideShow($images, 'en', 'Wedding Photos', '', $menu );
?>