<?
header('Content-Type: image/jpeg');
readfile("./Gallery/".$_GET['album']."/Mini/".$_GET['id']);
?>
