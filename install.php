<?php
//sætter en variabel op for konfigurations- og databasefilen så vi tjekke om de allerede eksisterer... 
$config = 'config/config.php';
$db = 'config/db.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>PR-katapulten</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex, nofollow" />
		
	<link href="style/style.css" rel="stylesheet" type="text/css" />
   	<link href='style/jquery.datepick.css' rel='stylesheet' type='text/css' />
	
<!-- javascript + JQuery brugt i PR-katapulten linkes til herfra START -->
<script language="javascript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script language="javascript" type="text/javascript">

(function($){ 


$(document).ready(function () {

$("#toern").hide();
$("#trinto").hide();

$('#videre').click(function() {

$("#tjek").hide();
$("#trinto").show();
$("#toern").show();

});

});

})(jQuery);

</script>

<div id="mid"> 

<h2>Installering af PR-katapulten</h2>	
<div id="tjek">
<!-- trin 1: tjekke...  START -->
Tjeklisten:<br>
<?php 
//tjekker om konfigurationsfilen eksisterer og er skrivbar...
if (!file_exists($config) && !is_writeable($config)) {
    echo "<div id='error'>Konfigurationsfilen <b>$config</b> eksisterer ikke, venligst opret den og gør den skrivbar - derefter skal du genopfriske dette vindue for at gå videre.</div>"; 
} else {
    echo "<div id='okj'>Konfigurationsfilen <b>$config</b>  eksisterer og kan skrives til :)</div>";
}
//tjekker om databasefilen eksisterer og er skrivbar...
if (!file_exists($db) && !is_writeable($db)) {
    echo "<div id='error'>Konfigurationsfilen <b>$db</b> eksisterer ikke, venligst opret den og gør den skrivbar - derefter skal du genopfriske dette vindue for at gå videre.</div>"; 
} else {
    echo "<div id='okj'>Konfigurationsfilen <b>$db</b>  eksisterer og kan skrives til :)<br><br>
	<span style='padding:90px;'><input type='submit' name='videre' id='videre' value='g&#229; videre  >>'></span></div>";
}
?>
</div>
<!-- trin 1: tjekke...  SLUT -->


<!-- trin 2: indtaste info til konfiguration- og databasefilen ...  START -->
<div id="trinto">
Trin to: Indtaste Titel, system e-mail, og databaseoplysning.<br><br>
<form name="config_trin" id="config_trin" action="install_done.php" method="post">
<table width="75%" id="toern">
<tr>
<td width="150">Titlen på jeres installation: </td><td><input type='text' id='titl' name='fra_navn' value='PR-katapulten - eller jeres egen titel'></td>
</tr>
<tr>
<td width="150">Systemets e-mail <br>(bruges som afsender på e-mails fra systemet): </td><td><input type='text' id='email' name='fra_email' value='ditnavn@kommune.dk'></td>
</tr>
<tr>
<td width="150">Systemets e-mail-host <br>(smtp-adressen fra IT-centeret): </td><td><input type='text' id='smtp_h' name='smtp_h' value=''></td>
</tr>
<tr>
<td colspan="2" style="text-align:center">&nbsp;</td></td>
</tr>
<tr>
<td colspan="2" style="text-align:center"><b>Databaseoplysning</b></td></td>
</tr><tr>
<td width="150">Databasens vært :</td><td><input type='text' id='host' name='host' value=''></td>
</tr>
<tr>
<td width="150">Brugernavn: </td><td><input type='text' id='user' name='user' value=''></td>
</tr>
<tr>
<td width="150">Koden til databasen: </td><td><input type='password' id='pass' name='pass' value=''></td>
</tr>
<tr>
<td colspan="2" style="text-align:center"><input type='submit' name='gem' id='gem' value='gem oplysninger i konfig-filerne'></form>
<!-- trin 2: indtaste info til konfiguration- og databasefilen ...  SLUT -->

</td>
</tr><tr>
</table>
</div>
</div>
</body>
</html>
