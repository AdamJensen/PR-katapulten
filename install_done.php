<?
//skriv oplysningerne på jeres MySQL-database ind
$host = $_REQUEST['host'];
$pass = $_REQUEST['pass'];
$usr = $_REQUEST['user'];
$database = "prkatapult";

//Respons på skærmen om at databasefilen bliver skrevet til nu...
print "skriver til database-konfig-filen...<br />";
$line='<?php $connect=@mysql_connect('.$host.', '.$usr. ', ' .$pass. '); ?>';

$fp = fopen('config/db3.php', 'w') or die("Error" . " File: " . __FILE__ . " on line: " . __LINE__);
fwrite($fp, $line) or die("Error" . " File: " . __FILE__ . " on line: " . __LINE__);
fclose($fp) or die("Error" . " File: " . __FILE__ . " on line: " . __LINE__);
print "...og færdig med databasen-konfigen...<br /><br />";

//Oplysninger til mail-konfigurationsfilen: fra navn, fra e-mail og smtp-server-adressen
$fra_n = $_REQUEST['fra_navn'];
$fra_e = $_REQUEST['fra_email'];
$smtp_h = $_REQUEST['smtp_h'];

//Respons på skærmen om at konfigurationsfilen bliver skrevet til nu...
print "skriver til mail-konfig-filen...<br />";
$line='<?php $site[from_name] = '.$fra_n.'; $site[from_email] ='.$fra_e.'; $site[smtp_mode] = enabled; $site[smtp_host] = '.$smtp_h.'; $site[smtp_post] = 25; $site[smtp_username] = null;?>';

$fp = fopen('config/config3.php', 'w') or die("Error" . " File: " . __FILE__ . " on line: " . __LINE__);
fwrite($fp, $line) or die("Error" . " File: " . __FILE__ . " on line: " . __LINE__);
fclose($fp) or die("Error" . " File: " . __FILE__ . " on line: " . __LINE__);
print " og nu er vi færdige med at skrive til mail-konfig-filen...<br /><br />";

//Respons på skærmen om at installationen er gemmenført og hvilken fil man skal slette for at kunne bruge PR-Katapulten.
print 'Du har nu installeret <b>'.$fra_n.'</b>.<br />Du skal slette filerne <em>install.php</em> og <em>install_done.php</em> før du kan gå videre til <a href=index.php>forsiden</a>.';


?>