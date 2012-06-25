<?php
//nuværende bruger hentes fra POST
$init = $_REQUEST['init'];

include ("config/db.php");
//Databasekald henter opgaver oprettet af brugeren fra linje 2
$query2 = "SELECT * FROM opgaver WHERE bruger = '$init' ORDER BY type DESC";
$result2 = mysql_query($query2);
if (!$result2) {
  die('Invalid query: ' .mysql_error());
}

?>

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
<div style="padding-left:10px;padding-right:10px;">
	<h1>
	PR-Katapulten
	</h1>
	<h2>
Indhold indsendt af bruger: <?php echo $init;?>
	</h2>	
	<div id="visindhold">
	<table width=100%>
<?php
//Indholdet fra databasekaldet (linje 6) vises her START
while ($row2 = mysql_fetch_assoc($result2)){
    echo "<tr><td width='15%'><b>Oprettet:</b> ";
	echo ($row2['oprettet']);
	echo "</td><td width='10%'>";
	echo "<b>skrevet af:</b> ";
	echo ($row2['bruger']); 
    echo "</td><td width='25%'><b>Titel:</b> ";
	echo ($row2['titel']);
	echo "</td>";
	echo "<td width='15%'><b>Type:</b> ";
	echo ($row2['type']);
	echo "</td>";
    echo "<td width='5%'><a href='rediger.php?id=";
    echo ($row2['id']);
	echo "&type=";
	echo $type;
	echo "&init=";
	echo $init;
    echo "'>[rediger]</a></td>";
	echo "<td width='5%'><a href='slet.php?id=";
    echo ($row2['id']);
    echo "&type=";
	echo $type;
	echo "&init=";
	echo $init;
	echo "'>[slet]</a></td>";
//Indholdet fra databasekaldet (linje 6) vises her START	

//Trækker enten et 0 (nul) eller 1 (et) ud af databasens opgaverække med navnet 'klarmeldt'
$klarmeldt = ($row2['klarmeldt']);

//en switch|afbryder der tager højde for om vist indhold er klarmeldt eller ej, og viser dette for brugeren START

	switch ($klarmeldt) {

case 1:
	echo "</td><td width='25%' id='klart' align='left'>";
    echo "Behandlet</td></tr>";
	break;

case 0:
if ($init == 'NIF' or $init == 'LHA' or $init == 'LOL' or $init == 'JLU' or $init == 'INJ') {

		echo "</td><td width='25%' align='left'><a href='klarmeldt.php?id=";
    echo ($row2['id']);
    echo "&type=";
	echo ($row2['type']);
	echo "'>Meld behandlet</a></td></tr>";
	
	break;
	}
else {

echo "</td><td width='25%' align='left'> ikke-behandlet</td></tr>";
	break;
	}

	}
	
//en switch|afbryder der tager højde for om vist indhold er klarmeldt eller ej, og viser dette for brugeren SLUT

}
mysql_close($connection);
			?>
			</table>
	</div>
	</div>
</body>
</html>
