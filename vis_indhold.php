<?php

//Nuværende bruger hentes ind fra POST
$init = $_REQUEST['init'];

include ("config/db.php");

//Databasekald der kigger efter indhold der er oprettet af brugeren fra POST (linje 3)
$query = "SELECT * FROM bruger ORDER BY init ";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Vis indhold lagt p&#229; PR-Katapulten </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex, nofollow" />
	
	<link href="style/style.css" rel="stylesheet" type="text/css" />

	<script language="javascript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

	<script language="javascript" type="text/javascript">

//Brugeren fra linje 3 omformes til en javascript-variabel til brug i rullemenuen med start i linje 49
var brg = "<?php echo $init; ?>";
	
	</script>


</head>

<body>
<?php include ('header.php'); ?>
<div style="padding-left:10px;">
	<h1>
	Velkommen til PR-Katapultens arkiv
	</h1>
	<h2>
Hvad vil du se ?
	</h2>	

	<form name="selectindhold">
				<!-- Rullemenu til valg af opgavevisning START  -->		
			<select id="type" name="type" ONCHANGE="window.location='indhold_vis.php?type='+this.value+'&init='+brg" size="1">
			<option value="" selected="selected">--- V&#230;lg hvilken type du opliste ---
			<option value="hjemmeside">Hjemmesiden
			<option value="enyhed">Elektronisk nyhedsbrev
			<option value="bibnyt">bit:nyt
			<option value="infoboard">InfoBoard
			<option value="fireaarstider">de 4 &#229;rstider
			<option value="plakater">Plakater
			<option value="billetbestilling">Billetbestilling
			<option value="kulturkalenderen">Kulturkalenderen
			</select>
   				<!-- Rullemenu til valg af opgavevisning SLUT  -->		
			</form>
	
	
	<br><br> eller se indhold jeg har oprettet<br>
	
	<form name="selectbruger">
			<!-- Rullemenu til valg af hvilke opgaver en specifik bruger har oprettet -->		
	<select  id="bruger" name="bruger" ONCHANGE="window.location='opgaver.php?init='+this.value" size="1">
	<option value="" selected="selected">--- V&#230;lg initialer fra listen her ---

<?php
while ($row = mysql_fetch_assoc($result)){
?>
	
	<option value="<?php echo($row['init']); ?>"><?php  echo($row['init']);
			
?>

	</select>
			<!-- Rullemenu til valg af hvilke opgaver en specifik bruger har oprettet SLUT-->
<?php		
}
mysql_close($connection);	
?>

</form>
</div>		
</body>
</html>
