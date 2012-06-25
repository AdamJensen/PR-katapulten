<?php 
//dagens dato i to formater
$today = date('d/m/Y');
$idag = date('d-m-Y');

include ("config/config.php");

include ("config/db.php");

//videresendte variabler fra index.php 
 $type_indhold = $_REQUEST['type_indhold'];
 $valg = $_REQUEST['valgteopgave'];
 $bruger = $_REQUEST['brg'];
 $titel = $_REQUEST['title'];
 $sted = $_REQUEST['sted'];
 $startdato = $_REQUEST['startdato'];
 $slutdato = $_REQUEST['slutdato'];
 $starttid = $_REQUEST['starttid'];
 $sluttid = $_REQUEST['sluttid'];
 $tekst = $_REQUEST['tekst_alle'];
 $billetantal = $_REQUEST['billetantal'];
 $spillested = $_REQUEST['spillested'];
 $salgstart = $_REQUEST['salgstart'];
 $salgslut = $_REQUEST['salgslut'];
 $ant_a1 = $_REQUEST['ant_a1'];
 $ant_a2 = $_REQUEST['ant_a2'];
 $ant_a3 = $_REQUEST['ant_a3'];
 $pris = $_REQUEST['pris'];
 $session = $_REQUEST['session_id'];
 $arr_ud = $_REQUEST['arr_ud'];
 $sendnu = $_REQUEST['sendmail[]'];
 $mail = $_REQUEST['mail'];
 $radio_tekst = $_REQUEST['radio_tekst'];
 
//videresendt bruger-variabel omformes til KAPITALER
 $bruger2 = strtoupper($_REQUEST['brg']);

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>PR-Katapulten - indhold gemt</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex, nofollow" />
	
	<link href="style/style.css" rel="stylesheet" type="text/css" />
    <link href='style/basic.css' rel='stylesheet' type='text/css' />
	<link href='style/jquery.datepick.css' rel='stylesheet' type='text/css' />
	

<script language="javascript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
 
<?php

include ('header.php');

$oldfart = "opgave%5B%5D=";

$newfart = "";

//Variablen Valg strippes for ovenskudende karakterer
$NyValg = str_replace($oldfart , $newfart , $valg); 

$Nyt = (explode('&', $NyValg));

//For hver variabel Nyt som V undersøges hvilke valg brugeren har sendte videre og data fra disse sendes til databasen START

foreach ($Nyt as $v) {

if ($type_indhold == 'type_born') {

mysql_query("INSERT INTO opgaver 
(id, session, oprettet, bruger, type, type_indhold, titel, sted, startdato, slutdato, starttid, sluttid,  tekst) VALUES('NULL','".$session."','".$today."','".$bruger2."','hjemmeside','".$type_indhold."','".$titel."','".$sted."','".$startdato."','".$slutdato."','".$starttid."','".$sluttid."','".$tekst."') ") 
or die(mysql_error()); 


include('mail/mail-hjemmesideborn.php');


}
 
else if ($v == 'hjemmesiden') {


mysql_query("INSERT INTO opgaver 
(id, session, oprettet, bruger, type, type_indhold, titel, sted, startdato, slutdato, starttid, sluttid,  tekst) VALUES('NULL','".$session."','".$today."','".$bruger2."','hjemmeside','".$type_indhold."','".$titel."','".$sted."','".$startdato."','".$slutdato."','".$starttid."','".$sluttid."','".$tekst."') ") 
or die(mysql_error()); 


include('mail/mail-hjemmeside.php');

	
}	
else if ($v == 'enyhed') {


mysql_query("INSERT INTO opgaver 
(id, session, oprettet, bruger, type , type_indhold, titel, sted, startdato, slutdato, starttid, sluttid, tekst) VALUES('NULL','".$session."','".$today."','".$bruger2."','enyhed','".$type_indhold."','".$titel."','".$sted."','".$startdato."','".$slutdato."','".$starttid."','".$sluttid."','".$tekst."') ") 
or die(mysql_error()); 

include('mail/mail-nyhedsbrev.php');

}

else  if ($v == 'bibnyt'){

mysql_query("INSERT INTO opgaver 
(id, session, oprettet, bruger, type, type_indhold, titel, sted, startdato, slutdato, starttid, sluttid, tekst) VALUES
('NULL','".$session."','".$today."','".$bruger2."','bibnyt','".$type_indhold."','".$titel."','".$sted."','".$startdato."','".$slutdato."','".$starttid."','".$sluttid."','".$tekst."') ") 
or die(mysql_error()); 

include('mail/mail-bibnyt.php');

}

else  if ($v == 'infoboard') {

mysql_query("INSERT INTO opgaver 
(id, session, oprettet, bruger, type, type_indhold, titel, sted, startdato, slutdato, starttid, sluttid, tekst) VALUES('NULL','".$session."','".$today."','".$bruger2."','infoboard','".$type_indhold."','".$titel."','".$sted."','".$startdato."','".$slutdato."','".$starttid."','".$sluttid."','".$tekst."') ") 
or die(mysql_error()); 

include('mail/mail-infoboard.php');

}
	
else if ($v =='kultunaut') {

mysql_query("INSERT INTO opgaver 
(id, session, oprettet, bruger, type, type_indhold, titel, sted, startdato, slutdato, starttid, sluttid, tekst, spillested) VALUES('NULL','".$session."','".$today."','".$bruger2."','kultunaut','".$type_indhold."','".$titel."','".$sted."','".$startdato."','".$slutdato."','".$starttid."','".$sluttid."','".$tekst."','".$sted."') ") 
or die(mysql_error()); 
 

include('mail/mail-kultunaut.php');

}

else if ($v == 'ballerupbladet') {
	
mysql_query("INSERT INTO opgaver 
(id, session, oprettet, bruger, type, type_indhold, titel, sted, startdato, slutdato, starttid, sluttid, tekst) VALUES('NULL','".$session."','".$today."','".$bruger2."','ballerupbladet','".$type_indhold."','".$titel."','".$sted."','".$startdato."','".$slutdato."','".$starttid."','".$sluttid."','".$tekst."') ") 
or die(mysql_error()); 


include('mail/mail-ballerupbladet.php');

}


else if ($v == 'kiglyt') {


mysql_query("INSERT INTO opgaver 
(id, session, oprettet, bruger, type, type_indhold, titel, sted, startdato, slutdato, starttid, sluttid, tekst) VALUES('NULL','".$session."','".$today."','".$bruger2."','kiglyt','".$type_indhold."','".$titel."','".$sted."','".$startdato."','".$slutdato."','".$starttid."','".$sluttid."','".$tekst."') ") 
or die(mysql_error());

include('mail/mail-kigoglyt.php');

	}

else if ($v == 'fireaarstider') {

mysql_query("INSERT INTO opgaver 
(id, session, oprettet, bruger, type, type_indhold, titel, sted, startdato, slutdato, starttid, sluttid, teaser_4aarstider, hoved_4aarstider) VALUES('NULL','".$session."','".$today."','".$bruger2."','fireaarstider','".$type_indhold."','".$titel."','".$sted."','".$startdato."','".$slutdato."','".$starttid."','".$sluttid."','".$tekst."') ") 
or die(mysql_error()); 

include('mail/mail-fireaarstider.php');

	}
	
else if ($v == 'plakater') {

mysql_query("INSERT INTO opgaver 
(id, session, oprettet, bruger, type, type_indhold, titel, sted, startdato, slutdato, starttid, sluttid, tekst,ant_a1,ant_a2, ant_a3) VALUES('NULL','".$session."','".$today."','".$bruger2."','plakater','".$type_indhold."','".$titel."','".$sted."','".$startdato."','".$slutdato."','".$starttid."','".$sluttid."','".$tekst."','".$ant_a1."','".$ant_a2."','".$ant_a3."') ") 
or die(mysql_error()); 

include('mail/mail-plakater.php');

}

else if ($v == 'billetbestilling') {

mysql_query("INSERT INTO opgaver 
(id, session, oprettet, bruger, type, type_indhold, titel, sted, startdato, slutdato, starttid, sluttid, billetantal, spillested, salgstart, salgslut, pris) VALUES('NULL','".$session."','".$today."','".$bruger2."','billetbestilling','".$type_indhold."','".$titel."','".$sted."','".$startdato."','".$slutdato."','".$starttid."','".$sluttid."','".$billetantal."','".$spillested."','".$salgstart."','".$salgslut."','".$pris."') ") 
or die(mysql_error()); 

include('mail/mail-billetter.php');

}

else if ($v == 'kulturkalenderen'){

mysql_query("INSERT INTO opgaver 
(id, session, oprettet, bruger, type, type_indhold, titel, sted, startdato, slutdato, starttid, sluttid, billetantal, spillested, salgstart, salgslut) VALUES('NULL','".$session."','".$today."','".$bruger2."','kulturkalenderen','".$type_indhold."','".$titel."','".$sted."','".$startdato."','".$slutdato."','".$starttid."','".$sluttid."','".$billetantal."','".$spillested."','".$salgstart."','".$salgslut."') ") 
or die(mysql_error()); 

include('mail/mail-kulturkalenderen.php');

	}
	
else if ($v == 'kommunalesider'){

mysql_query("INSERT INTO opgaver 
(id, session, oprettet, bruger, type, type_indhold, titel, sted, startdato, slutdato, starttid, sluttid, spillested, salgstart, salgslut, tekst) VALUES('NULL','".$session."','".$today."','".$bruger2."','kommunalesider','".$type_indhold."','".$titel."','".$sted."','".$startdato."','".$slutdato."','".$starttid."','".$sluttid."','".$spillested."','".$salgstart."','".$salgslut."','".$tekst."') ") 
or die(mysql_error()); 

include('mail/mail-kommunalesider.php');

	}


	
else if ($v == 'ballerupradio'){

include('mail/mail-ballerupradio.php');

	}
	
}

//For hver variabel Nyt som V undersøges hvilke valg brugeren har sendte videre og data fra disse sendes til databasen SLUT


//Når indholdet er sendt afsted til databasen og mail sendt afsted til modtagerne vil brugeren få følgende respons på skærmen :

echo '<div id="success"><h2>Succes!</h2>Dit  afsendte indhold er nu blevet gemt p&#229; PR-Katapulten.<br><br> Vi har sendt en e-mail afsted til ansvarshavende redakt&#248;r.<br><br>Vi du g&#229; til:<br><br><a href="http://130.227.16.64/pr-katapulten/vis_indhold.php">PR-Katpultens arkiv</a><br><br><a href="http://130.227.16.64/pr-katapulten/index.php">PR-Katpultens forside</a><br><br><a href="http://giraffen">Vil du afslutte (Retur til Giraffen)</div>';

//Ekstra: Hvis indholdet er enten et arragement eller kursus vil data desuden sendes til enten arrangement- eller kursus-tabellen

if ($type_indhold = 'type_arr' or $type_indhold = 'type_uds'){

mysql_query("INSERT INTO arrangementer 
(id, session, oprettet, bruger, titel, startdato, slutdato, starttid, sluttid, sted) VALUES('NULL','".$session."','".$today."','".$bruger2."','".$titel."','".$startdato."','".$slutdato."','".$starttid."','".$sluttid."','".$sted."') ") 
or die(mysql_error()); 

}

if ($type_indhold = 'type_kur'){

mysql_query("INSERT INTO kurser 
(id, session, oprettet, bruger, titel, startdato, slutdato, starttid, sluttid, sted) VALUES('NULL','".$session."','".$today."','".$bruger2."','".$titel."','".$startdato."','".$slutdato."','".$starttid."','".$sluttid."','".$sted."') ") 
or die(mysql_error()); 

}

//databaseforbindelsen lukkes 

mysql_close($connection);
?>
