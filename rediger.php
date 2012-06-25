<?php 

//Opgavens id og eventuel bruger hentes fra POST
$id = $_REQUEST['id'];
$init = $_REQUEST['init'];

include ("config/db.php");

//Databaseopslaget der skal bruges senere
$query3 = "SELECT * FROM opgaver WHERE id = '$id' LIMIT 1";
$result3 = mysql_query($query3);
if (!$result3) {
  die('Invalid query: ' . mysql_error());
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>	PR-Katapulten</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex, nofollow" />
	
	<link href="style/style.css" rel="stylesheet" type="text/css" />

<script language="javascript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script type="text/javascript" src="js/jquery.datepick.js"></script>
<script type="text/javascript" src="js/jquery.datepick-da.js"></script>

<script language="javascript" type="text/javascript">

$(document).ready(function () {
 
//funktion der viser laget _samlet_ til højre for inputformularen START
$("input[type='button']:first").click(function(evt) {
        evt.preventDefault();
        $("#samlet").show();
    });
//funktion der viser laget _samlet_ til højre for inputformularen SLUT

$('.datovalg').datepick({dateFormat: 'dd/mm/yyyy'});

//  
$('#btn3').click(function() {
			
			$('form:first').submit();
 
			    return true;
});

});
 
</script>


</head>


<body>
<?php include ('header.php'); ?>
<div style="padding-left:10px;padding-right:10px;">

<!-- indholdet vises herefter START -->
<?php while( $row3= mysql_fetch_assoc($result3)) { 

$type = ($row3['type']);
$session = ($row3['session']);


?>
<h2>
Du kan nu redigere indhold med titlen: <u><?php echo ($row3['titel']); ?></u> og via kanalen <u><?php echo ($row3['type']); ?></u>
</h2>	
	
	<div id="visindhold">
	</td></tr>
<div class="Button">
        <input type="button" value="Saml indhold" /><br>
<small>Tekst i nedenst&#229;ende felter i<br>en samlet tekstvisning</small>
    </div>   
	<div id="samlet">
<?php
	echo "<h3>indhold til samlet kopiering</h3>";
	echo ($row3['titel']);
	echo "<br>";
	echo ($row3['sted']);
	echo "<br>";
	echo ($row3['type_indhold']);
	echo "<br>";
	echo ($row3['bruger']);
	echo "<br>";
	echo ($row3['startdato']);
	echo "<br>";
	echo ($row3['starttid']);
	echo "<br>";
	echo ($row3['slutdato']);
	echo "<br>";
	echo ($row3['sluttid']);
	echo "<hr width='300'>";
	echo ($row3['tekst']);
	
	if ($type == 'plakater'){
	echo ($row3['tekst_plakat']);
	echo "<br>";
	echo ($row3['ant_a1']);
	echo "<br>";
	echo ($row3['ant_a2']);
	echo "<br>";
	echo ($row3['ant_a3']);
	echo "<br>";
		}
	else if ($type == 'billetbestilling'){
	echo ($row3['billetantal']);
	echo "<br>";
	echo ($row3['spillested']);
	echo "<br>";
	echo ($row3['salgsstart']);
	echo "<br>";
	echo ($row3['salgsslut']);
	echo "<br>";
	echo ($row3['pris']);
	
	}
?>
	</div>	
		
	<form name='rediger' id='rediger' action='gem_aendringer.php' method="post">
	<input id="typ" type="hidden" name="type" value="<?php echo ($row3['type']);?>">
	<input id="id" type="hidden" name="id" value="<?php echo ($row3['id']);?>">
<div id="indhold">
	<table width=60%>
<?php

$typ_indhold = $row3['type_indhold'];
    echo "<tr><td style='width:20%'>";
	echo "<b>skrevet af:</b></td><td>";
	echo ($row3['bruger']); 
    echo "<br></td></tr><tr><td><b>(Nuv&#230;rende) Type: </b>";
	echo "</td><td>";
	
 if($typ_indhold == 'type_born' ) { ?>
  <select  id='type_indhold' name='type_indhold'  size='1'>
			<option value='type_born' selected='selected'>---B&#248;rnebiblioteket
			<option value='type_arr'>---Arrangement
			<option value='type_uds'>---Udstilling
			<option value='type_kur'>---Kursus
			<option value='type_and'>---Andet
			</select>
<? }

 elseif($typ_indhold == 'type_arr' ){ ?>
<select  id='type_indhold' name='type_indhold'  size='1'>
			<option value='type_born'>---B&#248;rnebiblioteket
			<option value='type_arr' selected='selected'>---Arrangement
			<option value='type_uds'>---Udstilling
			<option value='type_kur'>---Kursus
			<option value='type_and'>---Andet
			</select>
<? }

 elseif($typ_indhold =='type_uds' ){ ?>
<select  id='type_indhold' name='type_indhold'  size='1'>
			<option value='type_born'>---B&#248;rnebiblioteket
			<option value='type_arr'>---Arrangement
			<option value='type_uds' selected='selected'>---Udstilling
			<option value='type_kur'>---Kursus
			<option value='type_and'>---Andet
			</select>
<? }

 elseif ($typ_indhold == 'type_kur' ){ ?>
<select  id='type_indhold' name='type_indhold'  size='1'>
			<option value='type_born'>---B&#248;rnebiblioteket
			<option value='type_arr'>---Arrangement
			<option value='type_uds'>---Udstilling
			<option value='type_kur' selected='selected'>---Kursus
			<option value='type_and'>---Andet
			</select>
<? }

 elseif($typ_indhold == 'type_and'){ ?>
<select  id='type_indhold' name='type_indhold'  size='1'>
			<option value='type_born'>---B&#248;rnebiblioteket
			<option value='type_arr'>---Arrangement
			<option value='type_uds'>---Udstilling
			<option value='type_kur'>---Kursus
			<option value='type_and'selected='selected'>---Andet
			</select>
<? }

 elseif($typ_indhold == ''){ ?>
<select  id='type_indhold' name='type_indhold'  size='1'>
			<option value='' selected='selected'>--- V&#230;lg indholdstype fra listen her ---
			<option value='type_born'>---B&#248;rnebiblioteket
			<option value='type_arr'>---Arrangement
			<option value='type_uds'>---Udstilling
			<option value='type_kur'>---Kursus
			<option value='type_and'>---Andet
			</select>
<? 
}
?>
<< V&#230;lg ny type</td></tr> 
<?
	echo "<tr><td width='25%'><b>Titel:</b></td><td><input type='text' size='20' id='title' name='title' value='";
	echo ($row3['titel']);
	echo "'><br></td></tr>";
	echo "<tr><td><b>Kanal:</b></td><td>";
    echo ($row3['type']);
    echo "<br></td></tr>";
	echo "<tr><td><b>(nuv&#230;rende) Sted:</b>&nbsp;&nbsp;&nbsp;&nbsp;";
    echo ($row3['sted']);
    echo "</td><td><select  id='sted' name='sted'  size='1'>
			<option value='' selected='selected'>--- V&#230;lg sted fra listen her ---
			<option value='Modestedet'>---M&#248;destedet
			<option value='Alrummet'>---Alrummet
			<option value='Balkonen'>---Balkonen
			<option value='Ballerup'>---Ballerup Bibliotek
			<option value='Skovlunde'>---Skovlunde Kulturhus
			<option value='Malov'>---Kulturhus M&#229;l&#248;v
			<option value='Anden'>---Anden
			</select> << V&#230;lg nyt sted</td></tr>";
    echo "<tr><td><b>Startdato:</b></td><td><input type='text' size='7' id='startdato' class='datvalg' name='startdato' value='";
    echo ($row3['startdato']);
    echo "'><br></td></tr>";
	echo "<tr><td><b>Starttid:</b></td><td><input type='text' size='7' id='starttid' name='starttid' value='";
    echo ($row3['starttid']);
    echo "'><br></td></tr>";
	echo "<tr><td><b>Slutdato:</b></td><td><input type='text' size='7' id='slutdato' class='datovalg' name='slutdato' value='";
    echo ($row3['slutdato']);
    echo "'><br></td></tr>";
	echo "<tr><td><b>Sluttid:</b></td><td><input type='text' size='7' id='sluttid' name='sluttid' value='";
    echo ($row3['sluttid']);
    echo "'><br></td></tr>";
	echo "<tr><td><b>Tekst:</b></td><td><TEXTAREA NAME='tekst' COLS=45 ROWS=6>";
echo ($row3['tekst']);
echo "</TEXTAREA></td></tr>";


}

if ($type == 'billetbestilling'){
echo "<tr><td colspan='2'><b><u>Billetter</u></b></td></tr>";
echo "<tr><td width='100'><b>Antal:</b></td><td><input type='text' size='5' name='billetantal' value='";
echo ($row3['billetantal']);
echo "'></td>
</tr><td width='300'><b>Spillested:</b></td><td><input type='text' size='20' name='spillested' value='";
echo ($row3['spillested']);
echo "'></td></tr><tr><td><b>Salgsperiode(start):</b></td><td><input type='text' name='salgstart' value='";
echo ($row3['salgsstart']);
echo "'></td></tr><tr><td><b>Salgsperiode(slut):</b></td><td><input type='text' name='salgslut' value='";
echo ($row3['salgsslut']);
echo "'></td></tr><tr><td><b>Billetpris: </b></td><td><input type='text' size='2' name='pris' value='";
echo ($row3['pris']);
echo "'> kroner</td></tr>";
}


?>
</div>

<tr><td>&nbsp;</td><td>
<?php include("ups2.php"); 

echo "</td></tr>";

$query4 = "SELECT * FROM upload WHERE upload.session = '$session'";
$result4 = mysql_query($query4);
/*if (!$result4) {
  die('Invalid query: ' . mysql_error())
}*/

echo "<tr><td>&nbsp;</td><td><b>Nuv&#230;rende filer er blevet tilknyttet ovenst&#229;ende indhold:</b></td></tr><tr>";
echo "<td>&nbsp;</td><td><small>Vil du tilknytte redigerede fil(er) skal tidligere (med samme navn) uploadede fil(er) slettes.</small></td></tr><tr>";
echo "<td>&nbsp;</td><td>";
  while ($row4= mysql_fetch_assoc($result4)) {

$filename = ($row4['filnavn']);

$ext = end(explode('.', $filename));
$file = strstr($filename, '.', true); 

echo "<span id='filvis'><a href='";
echo ($row4['filsti']); 
echo "' title='filnavn: ";
echo $file;
echo "'><img src='http://130.227.16.64/pr-katapulten/filer/icons/";
echo $ext;
echo "' alt='denne fil er af typen ";
echo $ext;
echo "' border='0'></a><b><span id='top_link'><a href='slet_fil.php?id=";
echo ($row4['id']);
echo "&type=";
echo $type;
echo "' title='du kan slette filen, HUSK! det kan ikke laves om igen.'>[x]</a></span>";
echo "</small></b></span>";

  }
  
?>
<!-- indholdet vises herefter SLUT -->
</td></tr>

<!-- muligheden for at melde indholdet behandlet vises her alt efter hvem brugeren er START -->
<?php if ($type == 'hjemmeside' && $init == 'NIF' ) { ?>
<tr><td width='100'>&nbsp;</td><td><input type='checkbox' name='klarmeld' id='klarmeld' value='tjek'> <b>Indholdet er f&#230;rdigbehandlet.</b></td></tr>
<?php } ?>

<?php if ($type == 'enyhed' && $init == 'NIF' ) { ?>
<tr><td width='100'>&nbsp;</td><td><input type='checkbox' name='klarmeld' id='klarmeld' value='tjek'> <b>Indholdet er f&#230;rdigbehandlet.</b></td></tr>
<?php } ?>

<?php if ($type == 'bibnyt' && $init == 'NIF' ) { ?>
<tr><td width='100'>&nbsp;</td><td><input type='checkbox' name='klarmeld' id='klarmeld' value='tjek'> <b>Indholdet er f&#230;rdigbehandlet.</b></td></tr>
<?php } ?>

<?php if ($type == 'infoboard' && $init == 'NIF' ) { ?>
<tr><td width='100'>&nbsp;</td><td><input type='checkbox' name='klarmeld' id='klarmeld' value='tjek'> <b>Indholdet er f&#230;rdigbehandlet.</b></td></tr>
<?php } ?>

<?php if ($type == 'kultunaut' && $init == 'NIF' ) { ?>
<tr><td width='100'>&nbsp;</td><td><input type='checkbox' name='klarmeld' id='klarmeld' value='tjek'> <b>Indholdet er f&#230;rdigbehandlet.</b></td></tr>
<?php } ?>

<?php if ($type == 'ballerupbladet' && $init == 'NIF' ) { ?>
<tr><td width='100'>&nbsp;</td><td><input type='checkbox' name='klarmeld' id='klarmeld' value='tjek'> <b>Indholdet er f&#230;rdigbehandlet.</b></td></tr>
<?php } ?>

<?php if ($type == 'kiglyt' && $init == 'NIF' ) { ?>
<tr><td width='100'>&nbsp;</td><td><input type='checkbox' name='klarmeld' id='klarmeld' value='tjek'> <b>Indholdet er f&#230;rdigbehandlet.</b></td></tr>
<?php } ?>

<?php if ($type == 'fireaarstider' && $init == 'NIF' ) { ?>
<tr><td width='100'>&nbsp;</td><td><input type='checkbox' name='klarmeld' id='klarmeld' value='tjek'> <b>Indholdet er f&#230;rdigbehandlet.</b></td></tr>
<?php } ?>

<?php if ($type == 'plakater' && $init == 'NIF' ) { ?>
<tr><td width='100'>&nbsp;</td><td><input type='checkbox' name='klarmeld' id='klarmeld' value='tjek'> <b>Indholdet er f&#230;rdigbehandlet.</b></td></tr>
<?php } ?>

<?php if ($type == 'billetbestilling' && $init == 'NIF' ) { ?>
<tr><td width='100'>&nbsp;</td><td><input type='checkbox' name='klarmeld' id='klarmeld' value='tjek'> <b>Indholdet er f&#230;rdigbehandlet.</b></td></tr>
<?php } ?>

<?php if ($type == 'kulturkalender' && $init == 'NIF' ) { ?>
<tr><td width='100'>&nbsp;</td><td><input type='checkbox' name='klarmeld' id='klarmeld' value='tjek'> <b>Indholdet er f&#230;rdigbehandlet.</b></td></tr>
<?php } ?>


<!-- muligheden for at melde indholdet behandlet vises her alt efter hvem brugeren er SLUT -->
<br>
<tr><td>&nbsp;</td><td>

<!-- skjulte felter og knapper START -->
<input id="brg" type="hidden" name="bruger" value="<?php echo $_REQUEST["init"]; ?>">
<input id="typ" type="hidden" name="type" value="<?php echo $_REQUEST["type"]; ?>">
<input id="btn3" type="submit" name="submit" value="Send &#230;ndringer"/></td></tr>
<!-- skjulte felter og knapper SLUT -->
</form>
			</table>
			
	</div>
	</div>
</body>
</html>
