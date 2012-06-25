<?php 
//Denne fil 
session_start();
//if, bruger og indholdstype hentes fra POST
$id = $_REQUEST['id'];
$bruger = $_REQUEST['init'];
$type = $_REQUEST['type'];
include ("config/db.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Indhold p&#229; PR-Katapulten</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex, nofollow" />
		<link href="style/style.css" rel="stylesheet" type="text/css" />

	<script language="javascript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

	
</head>

<body>

<?php
 include ('header.php');
//Respons:  "Vil du slette eller ej ? ... "
echo "<div style='padding-left:10px;'><h3>Er du sikker p&#229; at du vil slette indhold p&#229; PR-Katapulten?</h3>";
echo "<span style='padding-left:150px;font-size:130%;'><a href=slet_indhold?slet=ja&id=$id&init=$bruger>ja</a> | ";
echo "<a href=slet_indhold?slet=nej&id=$id&type=$type&init=$bruger>nej</a></span></div";

?>
</body>
</html>
 
