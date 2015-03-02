<?
session_destroy();
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'IT/Galleria.htm';  // change accordingly

header("Location: http://$host$uri/$extra");
exit;
?>



