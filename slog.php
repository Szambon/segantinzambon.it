<?
$location = $_GET['lang'];
if(!$location)
{
	$location = "IT";
}
session_destroy();
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
if($location == "EN")
{
	$extra = 'EN/Gallery.htm';
}
else{
	$extra = 'IT/Galleria.htm';
}
header("Location: http://$host$uri/$extra");
exit;
?>



