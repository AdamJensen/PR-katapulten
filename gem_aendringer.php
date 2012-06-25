<link href="style/style.css" rel="stylesheet" type="text/css" />
<link href='style/basic.css' rel='stylesheet' type='text/css' />

<?php 
/*
$today = date('d/m/Y');
$idag = date('d-m-Y');
*/
 

include ("config/config.php");
include ("config/db.php");

 $type_indhold = $_REQUEST['type_indhold'];
 $type = $_REQUEST['type'];
 $id = $_REQUEST['id'];
 $valg = $_REQUEST['valg'];
 $bruger = $_REQUEST['bruger'];
 $titel = $_REQUEST['title'];
 $sted = $_REQUEST['sted'];
 $startdato = $_REQUEST['startdato'];
 $slutdato = $_REQUEST['slutdato'];
 $starttid = $_REQUEST['starttid'];
 $sluttid = $_REQUEST['slutdato'];
 $tekst = $_REQUEST['tekst'];
 $ant_a1 = $_REQUEST['ant_a1'];
 $ant_a2 = $_REQUEST['ant_a2'];
 $ant_a3 = $_REQUEST['ant_a3'];
 $teaser_hjemmeside = $_REQUEST['teaser_hjemmeside'];
 $hoved_hjemmeside = $_REQUEST['hoved_hjemmeside'];
 $teaser_enyhed = $_REQUEST['teaser_enyhed'];
 $hoved_enyhed = $_REQUEST['hoved_enyhed'];
 $teaser_bibnyt = $_REQUEST['teaser_bibnyt'];
 $hoved_bibnyt = $_REQUEST['hoved_bibnyt'];
 $teaser_kultunaut = $_REQUEST['teaser_kultunaut'];
 $hoved_kultunaut = $_REQUEST['hoved_kultunaut'];
 $teaser_ballerupbladet = $_REQUEST['teaser_ballerupbladet'];
 $hoved_ballerupbladet = $_REQUEST['hoved_ballerupbladet'];
 $teaser_kulturkalender = $_REQUEST['teaser_kulturkalender'];
 $hoved_kulturkalender = $_REQUEST['hoved_kulturkalender'];
 $teaser_kiglyt = $_REQUEST['teaser_kiglyt'];
 $hoved_kiglyt = $_REQUEST['hoved_kiglyt'];
 $teaser_4aarstider = $_REQUEST['teaser_4aarstider'];
 $hoved_4aarstider = $_REQUEST['hoved_4aarstider'];
 $tekst_plakat = $_REQUEST['tekst_plakat'];
 $billetantal = $_REQUEST['billetantal'];
 $spillested = $_REQUEST['spillested'];
 $salgstart = $_REQUEST['salgstart'];
 $salgslut = $_REQUEST['salgslut'];
 $pris = $_REQUEST['pris'];


//Hvis indholdet bliver klarmeldt skal databasen opdateres med dette ...
if(isset($_POST['klarmeld']))
{
   mysql_query("UPDATE opgaver SET klarmeldt = '1' WHERE id = '".$id."'") 
or die(mysql_error());
}
else
{
   
}

//Her tages der stilling til om hvilken type indhold der skal opdateres ...
 
switch ($type) {

case 'hjemmeside':

mysql_query("UPDATE opgaver set titel= '".$titel."', sted= '".$sted."', type_indhold= '".$type_indhold."', startdato= '".$startdato."', starttid= '".$starttid."', slutdato= '".$sluttid."' , tekst= '".$tekst."' WHERE id= '".$id."'")
or die(mysql_error()); 


include('mail_red/mail-hjemmeside.php');

	
	break;
	
case 'enyhed':

mysql_query("UPDATE opgaver set titel= '".$titel."', sted= '".$sted."', type_indhold= '".$type_indhold."', startdato= '".$startdato."', starttid= '".$starttid."', slutdato= '".$sluttid."' , tekst= '".$tekst."' WHERE id= '".$id."'")
or die(mysql_error());  

include('mail_red/mail-nyhedsbrev.php');

	break;

case 'bibnyt':

mysql_query("UPDATE opgaver set titel= '".$titel."', sted= '".$sted."', type_indhold= '".$type_indhold."', startdato= '".$startdato."', starttid= '".$starttid."', slutdato= '".$sluttid."' , tekst= '".$tekst."' WHERE id= '".$id."'")
or die(mysql_error());  

include('mail_red/mail-bibnyt.php');


	break;
case 'infoboard':

mysql_query("UPDATE opgaver set titel= '".$titel."', sted= '".$sted."', type_indhold= '".$type_indhold."', startdato= '".$startdato."', starttid= '".$starttid."', slutdato= '".$sluttid."' , tekst= '".$tekst."' WHERE id= '".$id."'")
or die(mysql_error());  


include('mail_red/mail-inforboard.php');

	break;
	
case 'kultunaut':

mysql_query("UPDATE opgaver set titel= '".$titel."', sted= '".$sted."', type_indhold= '".$type_indhold."', startdato= '".$startdato."', starttid= '".$starttid."', slutdato= '".$sluttid."' , tekst= '".$tekst."' WHERE id= '".$id."'")
or die(mysql_error());

include('mail_red/mail-kultunaut.php');


	break;

case 'ballerupbladet':
	
mysql_query("UPDATE opgaver set titel= '".$titel."', sted= '".$sted."', type_indhold= '".$type_indhold."', startdato= '".$startdato."', starttid= '".$starttid."', slutdato= '".$sluttid."' , tekst= '".$tekst."' WHERE id= '".$id."'")
or die(mysql_error());



include('mail_red/mail-ballerupbladet.php');

	break;

case 'kiglyt':

mysql_query("UPDATE opgaver set titel= '".$titel."', sted= '".$sted."', type_indhold= '".$type_indhold."', startdato= '".$startdato."', starttid= '".$starttid."', slutdato= '".$sluttid."' , tekst= '".$tekst."' WHERE id= '".$id."'")
or die(mysql_error()); 

include('mail_red/mail-kigoglyt.php');

	break;

case 'fireaarstider':

mysql_query("UPDATE opgaver set titel= '".$titel."', sted= '".$sted."', type_indhold= '".$type_indhold."', startdato= '".$startdato."', starttid= '".$starttid."', slutdato= '".$sluttid."' , tekst= '".$tekst."' WHERE id= '".$id."'")
or die(mysql_error());  

include('mail_red/mail-fireaarstider.php');

	break;

case 'plakater':

mysql_query("UPDATE opgaver set titel= '".$titel."', sted= '".$sted."', type_indhold= '".$type_indhold."', startdato= '".$startdato."', starttid= '".$starttid."', slutdato= '".$sluttid."' , tekst= '".$tekst."' , ant_a1= '".$ant_a1."', ant_a2= '".$ant_a2."', ant_a3= '".$ant_a3."' WHERE id= '".$id."'")
or die(mysql_error());

include('mail_red/mail-plakater.php');

	break;

case 'billetbestilling':

mysql_query("UPDATE opgaver set titel= '".$titel."', sted= '".$sted."', type_indhold= '".$type_indhold."', startdato= '".$startdato."', starttid= '".$starttid."', slutdato= '".$sluttid."' , teaser_billetbestilling= '".$teaser_billetbestilling."', hoved_billetbestilling = '".$hoved_billetbestilling."',pris= '".$pris."' WHERE id= '".$id."'")
or die(mysql_error());

include('mail_red/mail-billetter.php');

break;

case 'kulturkalenderen':

mysql_query("UPDATE opgaver set titel= '".$titel."', sted= '".$sted."', type_indhold= '".$type_indhold."', startdato= '".$startdato."', starttid= '".$starttid."', slutdato= '".$sluttid."' , tekst= '".$tekst."' WHERE id= '".$id."'")
or die(mysql_error());

include('mail_red/mail-kulturkalenderen.php');

break;

case 'kommunalesider':

mysql_query("UPDATE opgaver set titel= '".$titel."', sted= '".$sted."', type_indhold= '".$type_indhold."', startdato= '".$startdato."', starttid= '".$starttid."', slutdato= '".$sluttid."' , tekst= '".$tekst."' WHERE id= '".$id."'")
or die(mysql_error());

include('mail_red/mail-kommunalesider.php');

break;

case 'ballerupsradio':

mysql_query("UPDATE opgaver set titel= '".$titel."', sted= '".$sted."', type_indhold= '".$type_indhold."', startdato= '".$startdato."', starttid= '".$starttid."', slutdato= '".$sluttid."' , tekst= '".$tekst."' WHERE id= '".$id."'")
or die(mysql_error());

include('mail_red/mail-ballerupradio.php');

break;
}
?>

<!-- Respons til brugerens opdatering START -- >
<link href='style/style.css' rel='stylesheet' type='text/css' />
<?php
include ('header.php');
echo "<div style='padding-left:10px'>Dine ændringer er blevet gensendt til den PR-ansvarlige og gemt i PR-katapultens arkiv.<br><br>Vi du g&#229; til:<br><br><a href='http://130.227.16.64/pr-katapulten/vis_indhold.php'>PR-Katpultens arkiv</a><br><br><a href='http://130.227.16.64/pr-katapulten/index.php'>PR-Katpultens forside</a><br><br><a href='http://giraffen'>Vil du afslutte (Retur til Giraffen)</div>";
// Respons til brugerens opdatering SLUT

mysql_close($connection);
?>
