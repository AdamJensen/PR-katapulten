<?php 
$type = $_REQUEST['type'];
$id = $_REQUEST['id'];
$bruger = $_REQUEST['init'];
$slet = $_REQUEST['slet'];
include ("config/db.php");

//Hvis ja, indholdet skal slettes ...
if ($slet == "ja")
{
?>

<link href="style/style.css" rel="stylesheet" type="text/css" />

<?php
//slet indholdet
$query = "DELETE FROM opgaver WHERE id = '$id'";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' .mysql_error());

	}
 include ('header.php');
 
Echo '<div style="padding-left:10px"><h2>Du har nu slettet indhold p&#229; PR-katapulten.</h2>Vi du g&#229; til:<br><br><a href="http://130.227.16.64/pr-katapulten/vis_indhold.php">PR-Katpultens arkiv</a><br><br><a href="http://130.227.16.64/pr-katapulten/index.php">PR-Katpultens forside</a><br><br><a href="http://giraffen">Vil du afslutte (Retur til Giraffen)</div>';

}
//hvis nej, indholdet ikke skal slettes ...
else if($slet == "nej"){
//gå tilbage til indholdet som brugeren kom fra / ville slette ...
header( "location: http://130.227.16.64/pr-katapulten/indhold_vis.php?type=$type");

}

?>
