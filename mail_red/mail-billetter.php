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
$mailer->Subject = 'Indhold til Billetbestilling p� PR-Katapulten er blevet opdateret.';
 
// Body - $init er initialerne p� den som har rettigheder til at godkende indholdet
$mailer->Body = 'Hej
Noget eksisterende indhold p� PR-Katapulten er blevet opdateret.
Link til indhold: http://dit-dom�ne/rediger.php?id='.$id.'&init=lha

Med venlig hilsen
Din venlige MailBot :)'; 

// Add an address to send to.
$mailer->AddAddress('den-ansvarlige@kommune.dk', 'Navn'); 



if(!$mailer->Send())
{
    echo 'e-mail kunne ikke afsendes... kontakt venligst administratoren af dette system.';
}
else
{
   /*echo "Dine �ndringer er blevet gensendt til den PR-ansvarlige.
Dine �ndringer er blevet gemt i PR-katapultens arkiv. G� til arkiv. <a href='http://130.227.16.64/pr-katapulten/vis_indhold.php?init=$bruger'>link</a><br>
Vil du indsende mere indhold via PR-katapulten? <a href='http://130.227.16.64/pr-katapulten/opgave.php?init=$bruger'>link</a>";*/
}
$mailer->ClearAddresses();
$mailer->ClearAttachments();

?>