<?php 

include ("config/db.php");
//id, bruger og indholdstype hentes fra POST
$id = $_REQUEST['id'];
$int = $_REQUEST['int'];
$type = $_REQUEST['type'];

//Opgaven opdateres som klarmeldt i databasen
mysql_query("UPDATE opgaver SET klarmeldt = '1' WHERE id = '".$id."'") 
or die(mysql_error());

//Respons vises for brugeren og link til arkivet...
echo "Indholdet er klarmeldt... << <a href='vis_indhold.php?'>tilbage</a> til PR-Katapultens arkiv";

?>
