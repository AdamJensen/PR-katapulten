<?php 


// de to installeringsfiler defineres
$install = 'install.php';
$done = 'install_done.php';

//Hvis de to filer eksisterer, slet dem...
if (file_exists($install) && file_exists($done)) {

echo "Hvis du har installeret PR-katapulten skal slette filerne <em>install.php</em> og <em>install_done.php</em> f&#248;r du kan bruge PR-katapulten.</br><br>G&#248;r det nu, og opdater dette vindue n&#229;r du har gjort det. Ellers kan du gå videre til <a href='install.php'>installationen</a>";

}

//Hvis de to file ikke eksisterer gå blot videre ...
else {



include_once ("config/db.php");

include('session.php');


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
<script type="text/javascript" src="js/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="js/jquery.datepick.js"></script>
<script type="text/javascript" src="js/jquery.datepick-da.js"></script>
<script type="text/javascript" src="uploadify/swfobject.js"></script>
<script type="text/javascript" src="uploadify/jquery.uploadify.v2.1.4.min.js"></script>

<!-- javascript + JQuery brugt i PR-katapulten linkes til herfra SLUT -->

<!-- JQuery-kode i brug på PR-katapulten START -->

<script language="javascript" type="text/javascript">
"use strict";

(function($){ 

$(document).ready(function () {

//fokus på tekstinput til brugerens initialer
$('#bruger').focus();
$('#bruger').css('border','red 1px solid');

$("#tekstbox").hide();

$('.datovalg').datepick({dateFormat: 'dd/mm/yyyy'});

//når brugeren har valgt en opgave og gået videre vil følgende funktion sørge for at de rigtige inputfelter bliver vist.	
$('#form1').click(function() {

if ($("#opgave1").is(":checked")) {
   
	$("#infohjemmeside").show();
	
} 
else {
	$("#infohjemmeside").hide();
}

if ($("#opgave2").is(":checked")) {
	$("#infoenyhed").show();
} 
else {
	$("#infoenyhed").hide();
}

if ($("#opgave3").is(":checked")) {
	$("#infobibnyt").show();
} 
else {
	$("#infobibnyt").hide();
}

if ($("#opgave4").is(":checked")) {
	$("#infoinfoboard").show();
} 
else {
	$("#infoinfoboard").hide();
}

if ($("#opgave5").is(":checked")) {
	$("#infokultunaut").show();
} 
else {
	$("#infokultunaut").hide();
}

if ($("#opgave6").is(":checked")) {
	$("#infoblad").show();
} 
else {
	$("#infoblad").hide();
}

if ($("#opgave7").is(":checked")) {
	$("#infokigoglyt").show();
} 
else {
	$("#infokigoglyt").hide();
}

if ($("#opgave8").is(":checked")) {
	$("#infofireaarstider").show();
} 
else {
	$("#infofireaarstider").hide();
}
if ($("#opgave9").is(":checked")) {
	$("#infoplakater").show();
} 
else {
	$("#infoplakater").hide();
}
if ($("#opgave10").is(":checked")) {
	$("#infobilletter").show();
} 
else {
	$("#infobilletter").hide();
}

if ($("#opgave11").is(":checked")) {
	$("#infokultur").show();
} 
else {
	$("#infokultur").hide();
}

if ($("#opgave12").is(":checked")) {
	$("#infokomm").show();
} 
else {
	$("#infokomm").hide();
}
if ($("#opgave13").is(":checked")) {
	$("#inforadio").show();
} 
else {
	$("#inforadio").hide();
}

}); 
//Funktion der viser ekstra-tekst-feltet
$('#tekstfelt').click(function() {

$('#tekst').show();

});

//Funktion der validerer om bruger har indtastet det rette antal bogstaver ..
$('#btn_1').click(function() { 

var count = $("#bruger").val().length;

//Hvis antal bogstaver er forskellig fra antal xx så skal formularen ikke sendes men skrive en fejlmedelelse...
if ( count !== 3 ) {

$('#bruger').focus();
$('#error').css('color','red');
$('#error').css('padding','5px');
$('#error').html('Du skal skrive dine initialer her');

return false;
}

//Hvis antallet er lig med det korrekte skal inputfelterne vises...
if ( count === 3 ) {

$('#brg').val($('#bruger').val());

$("#checkbox2").hide();
$("#info").hide();
$("#arkiv").hide();
$("#tekst").hide();



$("#titel").show();
$("#knap2").show();
$("#upload").show();

var opgave = ($('[id^="opgave"]').serialize());
$("#valgteopgave").val(opgave);
$("#session").show();
$("#valgt").show();


$("#infohjemmeside").hide();
$("#infoenyhed").hide();
$("#infobibnyt").hide();
$("#infoinfoboard").hide();
$("#infokultunaut").hide();
$("#infoblad").hide();
$("#infofireaarstider").hide();
$("#infoplakater").hide();
$("#infobilletter").hide();
$("#infokultur").hide();
$("#infokomm").hide();
$("#inforadio").hide();
$("#infokigoglyt").hide();


if ($('#opgave1').is(':checked')) {

$("#tilhjemmeside").show();
$("#titel").show();
$("#knap2").show();
$("#upload").show();

$("#valgteopgave").val(opgave);
$("#session").show();
$("#valgt").show();
$("#tekstbox").show();
} 

else {

$("#tilhjemmeside").hide();


}

if ($('#opgave2').is(':checked')) {

$("#tilenyhed").show();
$("#titel").show();
$("#knap2").show();
$("#upload").show();

$("#valgteopgave").val(opgave);
$("#session").show();
$("#valgt").show();
$("#tekstbox").show();

} 
else {

$("#tilenyhed").hide();


}

if ($('#opgave3').is(':checked')) {

$("#tilbibnyt").show();
$("#tekstbox").show();
} 
else {

$("#tilbibnyt").hide();


} 

if ($('#opgave4').is(':checked')) {

$("#tilinfoboard").show();
$("#tekstbox").show();

} 
else {

$("#tilinfoboard").hide();


}

if ($('#opgave5').is(':checked')) {

$("#tilkultunaut").show();
$("#extra").show();

} 
else {

$("#tilkultunaut").hide();


}

if ($('#opgave6').is(':checked')) {

$("#tilballerupbladet").show();
$("#extra").show();


} 
else {

$("#tilballerupbladet").hide();


}


if ($('#opgave7').is(':checked')) {

$("#tilkiglyt").show();
$("#extra").show();

} 
else {

$("#tilkiglyt").hide();


}

if ($('#opgave8').is(':checked')) {

$("#til4aarstider").show();


} 
else {

$("#til4aarstider").hide();


}

if ($('#opgave9').is(':checked')) {

$("#tilplakater").show();
$("#plakatextra").show();

} 
else {

$("#tilplakater").hide();


}

if ($('#opgave10').is(':checked')) {

$("#tilbilletter").show();
$("#billetter").show();

} 
else {

$("#tilbilletter").hide();
$("#billetter").hide();

}

if ($('#opgave11').is(':checked')) {

$("#tilkultur").show();
$("#titel").show();
$("#knap2").show();


$("#valgteopgave").val(opgave);
$("#session").show();
$("#valgt").show();
$(".upload").hide();

} 
else {

$("#tilkulturkalender").hide();


}


if ($('#opgave12').is(':checked')) {

$("#tilkommunen").show();
$("#extra").show();
} 
else {

$("#tilkommunen").hide();


}

if ($('#opgave13').is(':checked')) {


$("#tilradio").show();
$("#extra").show();



} 
else {

$("#tilradio").hide();


}


return false; 
}

});
});

})(jQuery);


</script>


<!-- JQuery-kode brugt i PR-katapulten SLUT -->

</head>


<body>
<!-- Indhold på PR-katapultens hovedside START -->
	<div id="wrapper">
<!-- header indsættes her START -->

	<?php include ('header.php'); ?>
	
<!-- header indsættes her SLUT -->

	<div id="info">
<!-- Oveskrift + information om hvad man kan gøre på PR-katapulten -->
<span id="overskrift">
	Velkommen til PR-katapulten
	</span><br><br>
Via PR-katapulten kan du:
<ul>
<li>sende indhold til de ansvarlige for videreformidling af din PR</li>
<li>anmode om oprettelse af billetbestilling</li>
<li>få adgang til <a href='vis_indhold.php' target='_self'>PR-katapultens arkiv</a></li>
<li>læse om PR-retningslinjer:</li>
<ul><li><a href="http://giraffen/Database/Bulletin/Bulletin.asp?Parm=71861270303E3437012B04DF216A02C123C800BF2563523A22240C4D52DF0461125A148D70F06228111A500C2508204690A047CF35FE">Mere PR-Info</a></li>
<li><a href="file:///V|/Center/Kultur og fritidsinstitutioner/Ballerup Bibliotek/PR-udvalget og PR-billeder/PR-billeder" target="_blank">PR-billeder</a></li>
<li><a href="http://giraffen/Database/Bulletin/Bulletin.asp?Parm=71861270303E3437012B04DF216A02C123C800BF2563523A22240C4D52DF0461125A148D70F06228111A500C2508204790A247C835F7">Oversigt over sæsonens arrangementer og udstillinger</a></li>
<li><a href="http://giraffen/database/bulletin/BulletinDetails.asp?Parm=3116D240303E7427410BD44FB13A622103C8102FF553423AE2548C5DB20FD420135A4549955B664F6427450125261045C03F8627801CA3118534331DD223B10A4038F24DF06DC25CD041560C011653403174D4741043C1542522023A42C31177F406932F03552D1172289511C61DA00F2556164A147365542469B546B436E2344012A201E43C1318C228011A7168C313617DD310304C73060104561E8043E54D70" title="se deadlines på Giraffen">Info om deadlines</li></a></ul>
<ul>


<div id="infoLeft">
Er du i tvivl om brugen af PR-katapulten?<br>
Henvend dig til <a href="mailto:nif@balk.dk">NIF</a> (Niels Frandsen)
</div>

</div>
<!-- Checkbokse til at få de rette inputtekstfelter frem alt efter hvilke opgave brugeren ønsker at løse START -->
<div id="checkbox2">
<form name="form1" id="form1">
<span id="overskrift">Indtast dine initialer:</span>  <input type="text" size="3" id="bruger" name="bruger"><span id="error" class="error"></span><br>
<h2>	Marker hvilke af nedenstående kanaler du vil sende til</h2>
			
<br>
<input type="checkbox" name="opgave[]" value="hjemmesiden" id="opgave1"> Hjemmesiden <br>
<input type="checkbox" name="opgave[]" value="enyhed" id="opgave2"> Elektronisk nyhedsbrev <br>
<input type="checkbox" name="opgave[]" value="bibnyt" id="opgave3"> bib:nyt <br>
<input type="checkbox" name="opgave[]" value="infoboard" id="opgave4"> InfoBoard <br>
<input type="checkbox" name="opgave[]" value="kultunaut" id="opgave5"> Kultunaut <br>
<input type="checkbox" name="opgave[]" value="ballerupbladet" id="opgave6"> Ballerup Bladet <br>
<input type="checkbox" name="opgave[]" value="kiglyt" id="opgave7"> Kig og Lyt <br>
<input type="checkbox" name="opgave[]" value="fireaarstider" id="opgave8"> 4 &#229;rstider <br>
<input type="checkbox" name="opgave[]" value="plakater" id="opgave9"> Plakater <br>
<input type="checkbox" name="opgave[]" value="billetbestilling" id="opgave10"> Billetbestilling <br>
<input type="checkbox" name="opgave[]" value="kulturkalenderen" id="opgave11"> Kulturkalenderen <br>
<input type="checkbox" name="opgave[]" value="kommunalesider" id="opgave12"> Kommunale sider <br>
<input type="checkbox" name="opgave[]" value="ballerupradio" id="opgave13"> Ballerup Radio <br><br>			
			<input id="btn_1" type="submit" name="submit" value="Gå videre" /><br><br>
</form>


<!-- Checkbokse til at få de rette inputtekstfelter frem alt efter hvilke opgave brugeren ønsker at løse SLUT -->

<div id="arkiv">

eller<br>

<br>... <a href='vis_indhold.php' target='_self'><b>Vis oprettet indhold [arkiv]</b></a>
</div>
</div>
<!-- Her er info-felter og input-tekstfelter START -->
<div id="indhold_tabel">
<table>
<tr>

	<td width="100%">
<form name='indhold' id='indhold' action='gemindhold.php' method="post">
<div id="valgt"><h2>Du har valgt at sende til:</h2></div>

<div id="tilhjemmeside">
<b>Indhold til hjemmesiden</b > Indhold bliver sendt til NIF.
</div> 
<div id="tilbibnyt">
<b>Indhold til bib:nyt</b> Indhold bliver sendt til STO. 
</div>
<div id="tilenyhed">
<b>Indhold til elektronisk nyhedsbrev</b> Indhold bliver sendt til NIF.
</div> 
<div id="tilinfoboard">
<b>Indhold til InfoBoard</b> Indhold bliver sendt til JLU. 
</div>
<div id="tekstbox"><br><i>I stedet for vedhæftning af tekstfil kan du også vælge at skrive en kort tekst: Klik på knappen</i>
<input type="button" value="vis tekstboks" id="tekstfelt"><br><br></div>


<div id="til4aarstider">
<b>Indhold til de 4 årstider</b> Indhold bliver sendt til LHA.
</div>
<div id="tilplakater">
<b>Bestilling af plakater</b> Indhold bliver sendt til Grafisk afdeling.
</div>
<div id="tilbilletter">
<b>Billetbestilling</b>  Indhold bliver sendt til LOL/INJ.
</div>
<div id="tilkultur">
<b>Kulturkalenderen</b>  Indhold bliver sendt til LHA.
</div>
	
<div id="extra">
<h2>Følgende kanaler dækkes <i>ikke</i> af PR-katapulten.</h2>
<div id="tilkommunen">
<b>Indhold til Kommunale sider</b><br>På kommunesiderne bringes meddelelser om lukkedage, åbningstider, kurser og arrangementer af speciel karakter.<br><br>Krav:<br>En kort sigende overskrift<br>En uddybende rubrik (2 korte sætninger)<br>3-4- sætninger med detaljeret information<br><br>Vi sender aldrig selv direkte til Kommunesiden – altid gennem <a href="mailto:sax@balk.dk">SAX</a>.</div>
<div id="tilkultunaut"><br><b>Indhold til KultuNaut</b><br>Du skal selv indtaste arrangementet<br>på KultuNauts hjemmeside >> <a href="http://www.kultunaut.dk/perl/arradd/type-nynaut" target="_blank">indtast her</a></div>
<div id="tilballerupbladet"><br>
<b>Indhold til Ballerup Bladet:</b><br>Du skal selv sende pressemeddelelsen til:<br>Ballerup Bladet <a href="mailto:red.bbl@berlingskemedia.dk?subject=Pressemeddelse fra Ballerup Bibliotekerne">red.bbl@berlingskemedia.dk</a><br>Spørgsmål – eller brug for hjælp? Kontakt <a href="mailto:lha@balk.dk">lha</a>.</div>
<div id="tilkiglyt"><br>
<b>Indhold til Kig og Lyt</b><br>Du skal selv sende pressemeddelelse til: <a href="mailto:kigoglyt@balk.dk">Kig og lyt</a><br>Det skal fremgå tydeligt, hvilken måned det ønskes bragt; dette skal fremgå af emnefelt i mail. Spørgsmål – eller brug for hjælp? Kontakt <a href="mailto:lha@balk.dk">lha</a>.</div>
<div id="tilradio"><br><b>Indhold til Ballerup Radio</b><br>Du skal selv sende pressemeddelse til: <a href="mailto:mb@radioballerup.com">Radio Ballerup</a></div>
</div>


<div id='titel'>
<br>
<table width='100%' border='0'>

<tr><td width='30'><b>Type:</b></td><td><select  id="type_indhold" name="type_indhold"  size="1">
			<option value="" selected="selected">--- V&#230;lg indholdstype fra listen her ---
			<option value="type_born">---Børnebiblioteket
			<option value="type_arr">---Arrangement
			<option value="type_uds">---Udstilling
			<option value="type_kur">---Kursus
			<option value="type_and">---Andet
			</select></td></tr>
<tr><td width='30'><b>Emne/Titel:</b></td><td><input type='text' size='30' name='title' value=''></td></tr>

<tr><td width='30'><b>Sted:</b></td><td><select  id="sted" name="sted"  size="1">
			<option value="" selected="selected">--- V&#230;lg sted fra listen her ---
			<option value="Modestedet">---M&#248;destedet
			<option value="Alrummet">---Alrummet
			<option value="Balkonen">---Balkonen
			<option value="Ballerup">---Ballerup Bibliotek
			<option value="Skovlunde">---Skovlunde Kulturhus
			<option value="Malov">---Kulturhus Måløv
			<option value="Anden">---Anden
			</select></td></tr>
<tr><td ><b>Startdato:</b></td><td width='30'><input type='text' id='startdato' class='datovalg' name='startdato' value=''></td></tr>
<tr><td><b>Starttid:</b></td><td><input type='text' id='starttid' name='starttid' value=''></td></tr>
<tr><td><b>Slutdato:</b></td><td><input type='text' id='slutdato' name='slutdato' class='datovalg' value=''><br></td></tr>
<tr><td><b>Sluttid:</b></td><td><input type='text' id='sluttid' name='sluttid' value=''></td></tr></table>
</div>

<div id="tekst">
<table width='100%' border='0'>
<tr><td colspan="2"><b><u>Tekst</u> (Redakt&#248;ren forbeholder sig redaktionsret)</b>
</td></tr>
<tr><td width="100">&nbsp;</td><td><TEXTAREA NAME="tekst_alle" COLS=45 ROWS=6></TEXTAREA></td></tr></table>
</div>

<div id='billetter'>
<h2>Til billetbestilling</h2>
<table width='100%' border='0'>
<tr><td width="100"><b>Antal:</b></td><td><input type='text' size='5' name='billetantal' value=''></td></tr>
<tr><td width="100"><b>Spillested:</b></td><td><input type='text' size='20' name='spillested' value=''></td></tr>
<tr><td><b>Salgsperiode(start):</b></td><td><input type='text' name='salgstart' value=''class='datepick'></td></tr>
<tr><td><b>Salgsperiode(slut):</b></td><td><input type='text' name='salgslut' value='' class='datepick'></td></tr>
<tr><td width="100"><b>Pris:</b></td><td><input type='text' size='5' name='pris' value=''></td></tr>
</table>

</div>


<div id="plakatextra">
<h2>Til plakater</h2>
<table>
<tr><td width='100'><b>Antal plakater i A1-størrelse: </b></td><td><input type='text' size='2' name='ant_a1' value=''> </td></tr>
<tr><td width='100'><b>Antal plakater i A2-størrelse: </b></td><td><input type='text' size='2' name='ant_a2' value=''> </td></tr>
<tr><td width='100'><b>Antal plakater i A3-størrelse: </b></td><td><input type='text' size='2' name='ant_a3' value=''> </td></tr>
</table>
</div>


<!-- Her er info-felter og input-tekstfelter SLUT -->

<!-- Knapper og diverse gemte felter med variabler der sendes videre -->
<div id="knap2">
<input id="session_id" type="hidden" name="session_id" value="<?php echo session_id(); ?>">
<input id="valgteopgave" type="hidden" name="valgteopgave" value="">
<input id="brg" type="hidden" name="brg" value="">
<!-- upload-formular inkluderes her -->
<br><div id="session"><?php include("ups.php"); ?><br>
<input id="btn2" type="submit" name="send" value="Send indholdet" />
</form>
</div>
</div>
<!-- info om hvorhen indholdet til de forskellige kanaler sendes START -->
<div id="infoom">
<div id="infohjemmeside"><b>Hjemmesiden:</b> Indholdet du sender via denne kanal sendes til NIF</div>
<div id="infoenyhed"><b>Elektronisk nyhedsbrev:</b> Indholdet du sender via denne kanal sendes til NIF</div>
<div id="infobibnyt"><b>bib:nyt:</b> Indholdet du sender via denne kanal sendes til STO</div>
<div id="infoinfoboard"><b>InfoBoard:</b> Indholdet du sender via denne kanal sendes til JLU</div>
<div id="infokultunaut"><b>KultuNaut:</b> Du skal selv indtaste arrangementet<br>på KultuNauts hjemmeside >> <a href="http://www.kultunaut.dk/perl/arradd/type-nynaut" target="_blank">Indtast her</a></span><br></div>
<div id="infoblad"><b>Ballerup Bladet:</b> Du skal selv sende pressemeddelelsen til:<br>Ballerup Bladet <a href="mailto:red.bbl@berlingskemedia.dk?subject=Pressemeddelse fra Ballerup Bibliotekerne">red.bbl@berlingskemedia.dk</a><br>Spørgsmål – eller brug for hjælp? Kontakt <a href="mailto:lha@balk.dk">LHA</a>.</div>
<div id="infokigoglyt"><b>Kig og Lyt:</b> Du skal selv sende pressemeddelelse til:<br>Rasmus Lindhardt/Kig og Lyt: <a href="mailto:nrl@balk.dk?subject=Arrangement til Kig og Lyt">nrl@balk.dk</a><br>Spørgsmål – eller brug for hjælp? Kontakt <a href="mailto:lha@balk.dk">lha</a>.</div>
<div id="infofireaarstider"><b>4 &#229;rstider:</b> Indholdet du sender via denne kanal sendes til LHA</div>
<div id="infoplakater">Plakater: </b>Indholdet du sender via denne kanal sendes til Grafisk afdeling</div>
<div id="infobilletter"><b>Billetter: </b>Indholdet du sender via denne kanal sendes til LOL/INJ</div>
<div id="infokultur"><b>Kulturkalender: </b>Indholdet du sender via denne kanal sendes til LHA</div>
<div id="infokomm"><b>Kommunale sider: </b>På kommunesiderne bringes meddelelser om lukkedage, åbningstider, kurser og arrangementer af speciel karakter.<br><br>Krav:<br>En kort sigende overskrift<br>En uddybende rubrik (2 korte sætninger)<br>3-4- sætninger med detaljeret information<br><br>Vi sender aldrig selv direkte til Kommunesiden – altid gennem <a href="mailto:sax@balk.dk">SAX</a>.<br></div>
<div id="inforadio"><b>Ballerup Radio:</b> Du skal selv sende pressemeddelse til: <a href="mailto:mb@radioballerup.com">Radio Ballerup</a></div>
</div>
<!-- info om hvorhen indholdet til de forskellige kanaler sendes SLUT -->

<!-- Database.forbindelse lukkes ned her -->

<?php mysql_close($connection); ?>

</td>
</tr>
</table>

</td>
</tr>

</table>


</div>

<?php
}
?>
<!-- Indhold på PR-katapultens hovedside SLUT -->
</body>
</html>
