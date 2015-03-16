<? 
include '../Slider_Template.php';
$images = loadImages('../Galleria/EventiCongressi/bin/images/large');
$menu = '<div id="mobile_menu" class="mobile_Navigation">
        <a href="../">Home</a> &raquo;
		
        <span>Meetings</span>
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
		<a href="Events_meetings_conferences.htm">Events Meeting Conferences</a> &raquo;
        <span>Meetings</span>
    <div class="related_images_dx"><label for="language_picker">Language: </label><div class="dropdown dropdown-dark"><select id="language_picker" class="dropdown-select"><option value="IT">IT</option><option value="EN" selected>EN</option></select></div></div>
</div>';
setUpSlideShow($images, 'en', 'Events and Meetings Photos', '', $menu );
?>