<?php
 
$query = "SELECT LAST_INSERT_ID()";
$result = mysql_query($query);
if ($result) {
$nrows = mysql_num_rows($result);
$row = mysql_fetch_row($result);
$lastID = $row[0];
$_SESSION["entryID"] = $lastID;
}

$bruger = $_REQUEST['bruger'];

// Grab our config settings
require_once('../config/config.php');
 
// Grab the FreakMailer class
require_once('phpmailer/MailClass.inc');
 
// instantiate the class
$mailer = new FreakMailer();
 
// Set the subject
$mailer->Subject = 'Nyt indhold til hjemmesiden på PR-Katapulten';
 
// Body $init er her initialerne på den ansvarlige for at godkende indholdet
$mailer->Body = '"Hej
Du bedes behandle nedenstående afsendt via PR-katapulten.
Link til indhold: http://dit-domæne/rediger.php?id='.$lastID.'&init=LHA

Med venlig hilsen
Din venlige MailBot :)';
 
// Add an address to send to.
$mailer->AddAddress('den-ansvarlige@kommune.dk', 'Navn');
 
if(!$mailer->Send())

    echo 'e-mail kunne ikke afsendes... kontakt venligst administratoren af dette system.';
}
else
{
 //   echo '<br><br>Dit indhold er nu sendt til de(n) ansvarlige og er samtidig gemt i PR-katapultens arkiv.<br>
//Du kan tilgå og evt. redigere i indholdet her: <a href="http://130.227.16.64/pr-katapulten/vis_indhold.php?init='.$bruger.'">Arkiv</a>';
}
$mailer->ClearAddresses();
$mailer->ClearAttachments();

?>
