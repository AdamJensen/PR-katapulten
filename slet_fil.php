<?php 
//id og indholdstype hentes fra POST
$id = $_REQUEST['id'];
$type = $_REQUEST['type'];

include ("config/db.php");

//Fil slettes fra databasen - den findes stadig på serveren 
$query6= "DELETE FROM upload WHERE id = $id";
$result6 = mysql_query($query6);
if (!$result6) {
  die('Invalid query: ' . mysql_error());
}

//Respons til brugeren og bruger kan hoppe tilbage til indholdet denne kom fra før...
echo "Filen er blevet slettet. <a href='http://130.227.16.64/pr-katapulten/rediger.php?id=";
echo $id;
echo "&t=";
echo $type;
echo "'><< tilbage</a>";
?>
