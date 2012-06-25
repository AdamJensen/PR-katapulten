<?php 



//Kanaltype hentes fra POST
$type = $_REQUEST['type'];

include ("config/db.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Indhold i PR-Katapultens arkiv</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex, nofollow" />
		<link href="style/style.css" rel="stylesheet" type="text/css" />

	<script language="javascript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>

	
</head>

<body>

 <?php include ('header.php'); ?>

<div style="padding-left:10px;">

<?php
//her hentes opgaver af typen (kanalvalg) ind til brug i visningen
$query = "SELECT * FROM opgaver WHERE type = '$type' ORDER BY id DESC";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' .mysql_error());
}

?>
	<h1>
	PR-Katapulten
	</h1>
	<h2>
Indsendt indhold af typen: <?php echo $type;?>
	</h2>	
	<div id="visindhold">
	<table width=100%>
<!-- Her vises resultaterne fra database-udtrækket i linje 33-37 START -->
			<?php
while ($row = mysql_fetch_assoc($result)){
    echo "<tr><td width='20%'><b>Oprettet:</b> ";
	echo ($row['oprettet']);
	echo "</td><td width='15%'>";
	echo "<b>skrevet af:</b> ";
	echo ($row['bruger']); 
    echo "</td><td width='35%'><b>Titel:</b> ";
	echo ($row['titel']);
	 echo "</td>";
    echo "<td width='10%'><a href='rediger.php?id=";
    echo ($row['id']);
	echo "&type=";
	echo $type;
	echo "&init=";
	echo $init;
    echo "'>[rediger]</a></td>";
	 echo "<td width='10%'><a href='slet.php?id=";
    echo ($row['id']);
    echo "&type=";
	echo $type;
	echo "&init=";
	echo $init;
	echo "'>[slet]</a></td>";

// Her vises resultaterne fra database-udtrækket i linje 33-37 START
	
//Her vises om indholdet er blevet behandlet
$klarmeldt = ($row['klarmeldt']);
	
	switch ($klarmeldt) {
//Hvis indholdet er behandlet
case 1:
	echo "</td><td width='25%' id='klart' align='left'>";
    echo "Behandlet</td></tr>";
	break;
//Hvis indholde ikke er behandlet *og* brugeren er NIF, LHA, LOL, JLU eller INJ <<-- disse skal selvfølgelig rettes til ...
case 0:
if ($init == 'NIF' or $init == 'LHA' or $init == 'LOL' or $init == 'JLU' or $init == 'INJ') {

		echo "</td><td width='25%' align='left'><a href='klarmeldt.php?id=";
    echo ($row['id']);
    echo "&type=";
	echo ($row['type']);
	echo "'>Meld behandlet</a></td></tr>";
	
	break;
	}
//Hvis indholdet er behandlet
else {


echo "</td><td width='25%' align='left'> ikke-behandlet</td></tr>";
	break;
	}

	}
}

//Databaseforbindelsen lukkes
mysql_close($connection);
			?>
</table>
</div>
</div>
</body>
</html>
