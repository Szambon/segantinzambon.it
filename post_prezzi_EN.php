<?php
function validateDate($date, $format = 'Y-m-d H:i:s') {
    $version = explode('.', phpversion());
    if (((int) $version[0] >= 5 && (int) $version[1] >= 2 && (int) $version[2] > 17)) {
        $d = DateTime::createFromFormat($format, $date);
    } else {
        $d = new DateTime(date($format, strtotime($date)));
    }
    return $d && $d->format($format) == $date;
}
$errori = 0;
$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
$errors_json = "[";
$data = $_POST['data'];
$data = str_replace("/", "-", $data);
if(!validateDate($data, 'd-m-Y')){
	$errori++;
	$errors_json.='{"id" : "data"},';
	}

$Nomi = $_POST['Nomi'];
if(!isset($_POST['Nomi']) || strlen($Nomi)==0){
	$errori++;
	$errors_json.='{"id" : "Nomi"},';
}
$tipo = $_POST['Tipo_Servizio'];
if(!isset($_POST['Tipo_Servizio']) || strpos($tipo, "'") !==false || strpos($tipo, '"')  !==false){
	$errori++;
	$errors_json.='{"id" : "Tipo_Servizio"},';
}


$tempoServizio = $_POST['Tempo'];
if(!isset($_POST['Tempo']) || strpos($tempoServizio, "'") !==false || strpos($tempoServizio, '"')){
	$errori++;
	$errors_json.='{"id" : "Tempo"},';
}

$luogo = $_POST['Luogo'];
if(!isset($_POST['Luogo']) || strlen($luogo)==0){
	$errori++;
	$errors_json.='{"id" : "Luogo"},';
}

$fotografi = $_POST['fotografi'];
if(!isset($_POST['fotografi']) || strpos($fotografi, "'") !==false || strpos($fotografi, '"') !==false){
	$errori++;
	$errors_json.='{"id" : "fotografi"},';
}
$StampaOnSite = $_POST['StampaOnSite'];
if(!isset($_POST['StampaOnSite']) || strpos($StampaOnSite, "'") !==false || strpos($StampaOnSite, '"') !==false){
	$errori++;
	$errors_json.='{"id" : "StampaOnSite"},';
}

$StampaProvini = $_POST['Stampa_provini'];
if(!isset($_POST['Stampa_provini']) || strpos($StampaProvini, "'") !==false || strpos($StampaProvini, '"') !==false){
	$errori++;
	$errors_json.='{"id" : "Stampa_provini"},';
}

$PubblicazioneInternet = $_POST['Pubblicazione_Internet'];
if(!isset($_POST['Pubblicazione_Internet']) || strpos($PubblicazioneInternet, "'") !== false || strpos($PubblicazioneInternet, '"') !== false){
	$errori++;
	$errors_json.='{"id" : "Pubblicazione_Internet"},';
}

$AlbumGenitori = $_POST['Album_Genitori'];
if(!isset($_POST['Album_Genitori']) || strpos($AlbumGenitori, '"') !== false || strpos($AlbumGenitori, "'") !==false){
	$errori++;
	$errors_json.='{"id" : "Album_Genitori"},';
}


$DVDSlide = $_POST['DVDSlideShow'];
if(!isset($_POST['DVDSlideShow']) || strpos($DVDSlide, '"') !== false || strpos($DVDSlide, "'") !==false){
	$errori++;
	$errors_json.='{"id" : "DVDSlideShow"},';
}

$Spesa = $_POST['Spesa'];
if(!isset($_POST['Spesa']) || strlen($Spesa)==0){
	$errori++;
	$errors_json.='{"id" : "Spesa"},';
}

$Conoscenza = $_POST['Conoscenza'];
if(!isset($_POST['Conoscenza']) || strpos($Conoscenza, '"') !== false || strpos($Conoscenza, "'") !==false){
	$errori++;
	$errors_json.='{"id" : "Conoscenza"},';
}


$Accortezze = $_POST['Accortezze'];
if(strpos($Accortezze, '"') !== false || strpos($Accortezze, "'") !==false){
	$errori++;
	$errors_json.='{"id" : "Accortezze"},';
}
$mailcomm = $_POST['mail'];
if(!isset($_POST['mail']) || !preg_match($regex, $mailcomm)){
	$errori++;
	$errors_json.='{"id" : "mail"},';
}

if($errori == 0){
	// The message
	$message = "Questo messaggio è generato dal form del sito in Inglese.<br/><b>Data</b>: $data<br/><b>Nomi</b>: $Nomi<br/><b>Tipo Servizio</b>: $tipo<br/><b>Luogo</b>: $luogo<br/> <b>Tempo Servizio</b>: $tempoServizio<br/><b>Fotografi</b>: $fotografi<br/><b>Stampante on site</b>: $StampaOnSite<br/><b>Stampa Provini</b>: $StampaProvini<br/><b>Pubblicazione in internet</b>: $PubblicazioneInternet<br/><b>Album Genitori</b>: $AlbumGenitori<br/><b>SlideShow DVD</b>: $DVDSlide<br/><b>Spesa</b>: $Spesa<br/><b>Conosciuti tramite</b>: $Conoscenza<br/><b>Accortezze particolari</b>: $Accortezze <br/><b>Mail Sposi</b>: $mailcomm";

	// In case any of our lines are larger than 70 characters, we should use wordwrap()
	$message = wordwrap($message, 70, "<br/>");
	
	$$headers1  = "MIME-Version: 1.0\r\n";
	$headers1 .= "Content-type: text/html; charset=UTF-8\r\n";
	$headers1 .= "From: $mailcomm\r\n";
	$headers1 .= "Reply-To: $mailcomm\r\n";

	// Send
	mail('foto@segantinzambon.it', 'Richiesta Matrimonio',$message, $headers1);
	
	echo "http://www.segantinzambon.it/prezziok_EN.htm";
}else{
	$errors_json=substr($errors_json, 0, -1)."]";
	echo $errors_json;
}
?>