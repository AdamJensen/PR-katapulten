<?php
//Denne fil laver et nyt session id så alle nye indtastning bliver unike; dette bruges til at sætte indhold sammen med de uploadede filer ...
session_start();

$old_sessionid = session_id();

session_regenerate_id();

$new_sessionid = session_id();

?>
