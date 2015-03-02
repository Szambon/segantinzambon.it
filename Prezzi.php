<?php
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="./Preventivi/preventivo.pdf"');
readfile('./Preventivi/preventivo.pdf');
?>